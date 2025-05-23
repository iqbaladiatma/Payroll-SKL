<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Pengajuan;
use App\Models\Datakaryawan;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->usertype === 'admin') {
            return redirect()->route('admin');
        }

        $datakaryawan = Datakaryawan::where('email', $user->email)->first();

        if (!$datakaryawan) {
            $datakaryawan = Datakaryawan::where('user_id', $user->id)->first();
        }

        if (!$datakaryawan) {
            $datakaryawan = Datakaryawan::create([
                'user_id' => $user->id,
                'nama' => $user->name,
                'email' => $user->email,
                'status' => 'aktif',
                'jabatan' => 'Staff',
                'nik' => '0000000000',
                'no_hp' => '-',
                'alamat' => '-',
                'tanggal_masuk' => now()
            ]);
        }

        $gajiBulanIni = Gaji::where('datakaryawan_id', $datakaryawan->id)
            ->where('bulan', now()->format('Y-m'))
            ->first();

        $riwayatGaji = Gaji::where('datakaryawan_id', $datakaryawan->id)
            ->orderBy('bulan', 'desc')
            ->get();

        $statusPengajuan = Pengajuan::where('user_id', $user->id)
            ->latest()
            ->first()?->status ?? 'Belum ada';

        $pengajuan = Pengajuan::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.dashboard', compact('gajiBulanIni', 'riwayatGaji', 'statusPengajuan', 'pengajuan', 'user', 'datakaryawan'));
    }
}
