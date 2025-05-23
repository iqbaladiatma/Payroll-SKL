<?php

namespace App\Http\Controllers;

use App\Models\Datakaryawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        return redirect()->route('admin') . '#karyawan';
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|unique:datakaryawans,nik',
            'email' => 'required|email|unique:datakaryawans,email',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'jabatan' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'gaji_pokok' => 'required|numeric|min:0',
            'status' => 'required|in:aktif,tidak aktif'
        ]);

        Datakaryawan::create($request->all());

        return redirect()->route('admin')->with('success', 'Data karyawan berhasil ditambahkan') . '#karyawan';
    }

    public function edit(Datakaryawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Datakaryawan $karyawan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|unique:datakaryawans,nik,' . $karyawan->id,
            'email' => 'required|email|unique:datakaryawans,email,' . $karyawan->id,
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'jabatan' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'gaji_pokok' => 'required|numeric|min:0',
            'status' => 'required|in:aktif,tidak aktif'
        ]);

        $karyawan->update($request->all());

        return redirect()->route('admin')->with('success', 'Data karyawan berhasil diperbarui') . '#karyawan';
    }

    public function destroy(Datakaryawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('admin')->with('success', 'Data karyawan berhasil dihapus') . '#karyawan';
    }
}
