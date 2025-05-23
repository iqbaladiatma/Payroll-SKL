<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index()
    {
        if (Auth::user()->usertype === 'admin') {
            $pengajuan = Pengajuan::with('user')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $pengajuan = Pengajuan::where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'desc')
                ->get();
        }
        return view('pengajuan.index', compact('pengajuan'));
    }

    public function create()
    {
        return view('pengajuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Pengajuan::create([
            'user_id' => Auth::user()->id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => 'menunggu',
            'tanggal_pengajuan' => now(),
        ]);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dibuat');
    }

    public function show(Pengajuan $pengajuan)
    {
        if (Auth::user()->usertype !== 'admin' && Auth::user()->id !== $pengajuan->user_id) {
            abort(403);
        }
        return view('pengajuan.show', compact('pengajuan'));
    }

    public function updateStatus(Request $request, Pengajuan $pengajuan)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak'
        ]);

        $pengajuan->update([
            'status' => $request->status,
            'tanggal_respon' => now()
        ]);

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui');
    }

    public function destroy(Pengajuan $pengajuan)
    {
        if (Auth::user()->usertype === 'admin' && in_array($pengajuan->status, ['diterima', 'ditolak'])) {
            $pengajuan->delete();
            return redirect()->back()->with('success', 'Pengajuan berhasil dihapus');
        }

        if (Auth::user()->id === $pengajuan->user_id && $pengajuan->status === 'menunggu') {
            $pengajuan->delete();
            return redirect()->back()->with('success', 'Pengajuan berhasil dihapus');
        }

        return redirect()->back()->with('error', 'Tidak dapat menghapus pengajuan ini');
    }
}
