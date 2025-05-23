@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row min-h-screen bg-gradient-to-br from-gray-900 to-blue-900">
  @include('layouts.sidebar')

  <main class="flex-1 p-6">
    <h2 class="text-3xl font-bold mb-8 text-blue-100">Buat Pengajuan Baru</h2>

    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-500/20 text-red-200 border border-red-500/30 rounded-xl">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="{{ route('pengajuan.store') }}" method="POST" class="bg-white/5 backdrop-blur-lg rounded-2xl border border-blue-800 p-6 space-y-6">
      @csrf
      <div>
        <label for="nama_pengaju" class="block text-sm font-medium text-blue-200 mb-1">Nama Pengaju</label>
        <input type="text" name="nama_pengaju" id="nama_pengaju" value="{{ auth()->user()->name }}" required readonly class="w-full bg-white/10 border border-blue-800 rounded-xl p-3 text-blue-200 focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div>
        <label for="judul" class="block text-sm font-medium text-blue-200 mb-1">Judul Pengajuan</label>
        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200 focus:ring-blue-500 focus:border-blue-500">
      </div>  
      <div>
        <label for="deskripsi" class="block text-sm font-medium text-blue-200 mb-1">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="4" required class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200 focus:ring-blue-500 focus:border-blue-500">{{ old('deskripsi') }}</textarea>
      </div>
      <div class="flex justify-end gap-4 pt-2">
        <a href="{{ route('user') }}#pengajuan" class="bg-gray-500/20 hover:bg-gray-500/30 text-blue-200 px-6 py-3 rounded-xl transition-colors">Batal</a>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl transition-colors">Kirim Pengajuan</button>
      </div>
    </form>
  </main>
</div>
@endsection