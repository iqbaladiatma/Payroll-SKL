<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Datakaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class GajiController extends Controller
{
    protected function runTransaction(callable $callback)
    {
        try {
            DB::beginTransaction();
            $result = $callback();
            DB::commit();
            return redirect()->back()->with('success', $result);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function index()
    {
        $user = Auth::user();
        $karyawan = Datakaryawan::where('status', 'aktif')->get();
        $gaji = $user->usertype === 'admin'
            ? Gaji::with('datakaryawan')->latest()->get()->groupBy('bulan')
            : $user->gaji()->with('datakaryawan')->latest()->get()->groupBy('bulan');

        return view('gaji.index', compact('karyawan', 'gaji'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'datakaryawan_id' => 'required|exists:datakaryawans,id',
            'bulan' => 'required|date_format:Y-m',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'required|numeric|min:0',
            'potongan' => 'required|numeric|min:0',
        ]);

        $karyawan = Datakaryawan::findOrFail($request->datakaryawan_id);

        if (Gaji::where('datakaryawan_id', $karyawan->id)->where('bulan', $request->bulan)->exists()) {
            return redirect()->back()->with('error', 'Gaji untuk karyawan ini pada bulan tersebut sudah ada');
        }

        return $this->runTransaction(function () use ($request, $karyawan) {
            $total_gaji = $request->gaji_pokok + $request->tunjangan - $request->potongan;
            Gaji::create([
                'datakaryawan_id' => $karyawan->id,
                'bulan' => $request->bulan,
                'gaji_pokok' => $request->gaji_pokok,
                'tunjangan' => $request->tunjangan,
                'potongan' => $request->potongan,
                'total_gaji' => $total_gaji,
                'status' => 'Belum Dibayar',
            ]);
            return 'Data gaji berhasil disimpan';
        });
    }

    public function update(Request $request, Gaji $gaji)
    {
        $request->validate([
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'required|numeric|min:0',
            'potongan' => 'required|numeric|min:0',
        ]);

        return $this->runTransaction(function () use ($request, $gaji) {
            $total_gaji = $request->gaji_pokok + $request->tunjangan - $request->potongan;
            $gaji->update([
                'gaji_pokok' => $request->gaji_pokok,
                'tunjangan' => $request->tunjangan,
                'potongan' => $request->potongan,
                'total_gaji' => $total_gaji,
            ]);
            return 'Data gaji berhasil diperbarui';
        });
    }

    public function destroy(Gaji $gaji)
    {
        return $this->runTransaction(function () use ($gaji) {
            $gaji->delete();
            return 'Data gaji berhasil dihapus';
        });
    }

    public function updateStatus(Gaji $gaji)
    {
        return $this->runTransaction(function () use ($gaji) {
            $gaji->update(['status' => 'Sudah Dibayar']);
            return 'Status gaji berhasil diperbarui';
        });
    }

    public function downloadKwitansi(Gaji $gaji)
    {
        // Check if user has permission to view this salary receipt
        $user = Auth::user();
        if ($user->usertype !== 'admin' && $gaji->datakaryawan_id !== $user->datakaryawan->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengunduh kwitansi ini');
        }

        $pdf = PDF::loadView('gaji.kwitansi', compact('gaji'));
        return $pdf->download('kwitansi-gaji-' . $gaji->datakaryawan->nama . '-' . date('Y-m') . '.pdf');
    }
}
