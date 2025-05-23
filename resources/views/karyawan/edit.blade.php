@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row min-h-screen bg-gradient-to-br from-gray-900 to-blue-900">
  @include('layouts.sidebar')

  <main class="flex-1 p-6">
    <h2 class="text-3xl font-bold mb-8 text-blue-100">Edit Data Karyawan</h2>

    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-500/20 text-red-200 border border-red-500/30 rounded-xl">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" class="bg-white/5 backdrop-blur-lg rounded-2xl border border-blue-800 p-6 space-y-6">
      @csrf
      @method('PUT')
      <div>
        <label for="nama" class="block text-sm font-medium text-blue-200 mb-1">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $karyawan->nama) }}" required class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200 focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div>
        <label for="nik" class="block text-sm font-medium text-blue-200 mb-1">NIK</label>
        <input type="text" name="nik" id="nik" value="{{ old('nik', $karyawan->nik) }}" required class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200 focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div>
        <label for="email" class="block text-sm font-medium text-blue-200 mb-1">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $karyawan->email) }}" required class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200 focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div>
        <label for="no_hp" class="block text-sm font-medium text-blue-200 mb-1">No. HP</label>
        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $karyawan->no_hp) }}" class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200 focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div>
        <label for="alamat" class="block text-sm font-medium text-blue-200 mb-1">Alamat</label>
        <textarea name="alamat" id="alamat" rows="3" class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200 focus:ring-blue-500 focus:border-blue-500">{{ old('alamat', $karyawan->alamat) }}</textarea>
      </div>
      <div>
        <label for="jabatan" class="block text-sm font-medium text-blue-200 mb-1">Jabatan</label>
        <select name="jabatan" id="jabatan" required class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200 focus:ring-blue-500 focus:border-blue-500">
          <option value="Staff" {{ old('jabatan', $karyawan->jabatan) == 'Staff' ? 'selected' : '' }}>Staff</option>
          <option value="Manager" {{ old('jabatan', $karyawan->jabatan) == 'Manager' ? 'selected' : '' }}>Manager</option>
          <option value="Supervisor" {{ old('jabatan', $karyawan->jabatan) == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
        </select>
      </div>
      <div>
        <label for="tanggal_masuk" class="block text-sm font-medium text-blue-200 mb-1">Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk', $karyawan->tanggal_masuk) }}" required class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200 focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div>
        <label for="gaji_pokok" class="block text-sm font-medium text-blue-200 mb-1">Gaji Pokok</label>
        <input type="number" name="gaji_pokok" id="gaji_pokok" value="{{ old('gaji_pokok', $karyawan->gaji_pokok) }}" required class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200 focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div>
        <label for="status" class="block text-sm font-medium text-blue-200 mb-1">Status</label>
        <select name="status" id="status" required class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200 focus:ring-blue-500 focus:border-blue-500">
          <option value="aktif" {{ old('status', $karyawan->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
          <option value="tidak aktif" {{ old('status', $karyawan->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
      </div>
      <div class="flex justify-end gap-4 pt-2">
        <a href="{{ route('admin') }}#karyawan" class="bg-gray-500/20 hover:bg-gray-500/30 text-blue-200 px-6 py-3 rounded-xl transition-colors">Batal</a>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl transition-colors">Update Karyawan</button>
      </div>
    </form>
  </main>
</div>
@endsection