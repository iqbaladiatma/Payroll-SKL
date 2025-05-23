@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row min-h-screen bg-gradient-to-br from-gray-900 to-blue-950 text-white">

  {{-- Sidebar --}}
  @include('layouts.sidebar')

  {{-- Main Content --}}
  <main class="flex-1 p-6 md:p-10 space-y-12">

    {{-- Notifikasi --}}
    @if (session('success'))
    <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 p-4 rounded-xl shadow-md">
      {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="bg-red-500/10 border border-red-500/20 text-red-300 p-4 rounded-xl shadow-md">
      {{ session('error') }}
    </div>
    @endif

    {{-- Dashboard --}}
    <section id="dashboard">
      <h2 class="text-3xl font-extrabold text-white mb-6">Dashboard</h2>

      {{-- Info Karyawan --}}
      <div class="mb-6 p-6 rounded-2xl bg-gradient-to-br from-purple-800/40 to-purple-600/10 border border-purple-500/20 shadow">
        <h3 class="text-xl font-semibold text-purple-200 mb-4">Informasi Karyawan</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <p class="text-purple-300">Nama: <span class="text-purple-100">{{ $datakaryawan->nama }}</span></p>
            <p class="text-purple-300">NIK: <span class="text-purple-100">{{ $datakaryawan->nik }}</span></p>
            <p class="text-purple-300">No HP: <span class="text-purple-100">{{ $datakaryawan->no_hp }}</span></p>
            <p class="text-purple-300">Alamat: <span class="text-purple-100">{{ $datakaryawan->alamat }}</span></p>
            <p class="text-purple-300">Jabatan: <span class="text-purple-100">{{ $datakaryawan->jabatan }}</span></p>
          </div>
          <div>
            <p class="text-purple-300">Email: <span class="text-purple-100">{{ $datakaryawan->email }}</span></p>
            <p class="text-purple-300">Status: <span class="text-purple-100">{{ $datakaryawan->status }}</span></p>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="p-6 rounded-2xl bg-gradient-to-br from-blue-800/40 to-blue-600/10 border border-blue-500/20 shadow">
          <h3 class="text-xl font-semibold text-blue-200">Gaji Bulan Ini</h3>
          <p class="text-4xl font-bold text-blue-300 mt-2">Rp {{ number_format($gajiBulanIni?->total_gaji ?? 0, 0, ',', '.') }}</p>
          @if($gajiBulanIni)
          <div class="mt-4 space-y-1 text-sm">
            <p class="text-blue-300">Gaji Pokok: <span class="text-blue-100">Rp {{ number_format($gajiBulanIni->gaji_pokok, 0, ',', '.') }}</span></p>
            <p class="text-green-300">Tunjangan: <span class="text-green-100">Rp {{ number_format($gajiBulanIni->tunjangan, 0, ',', '.') }}</span></p>
            <p class="text-red-300">Potongan: <span class="text-red-100">Rp {{ number_format($gajiBulanIni->potongan, 0, ',', '.') }}</span></p>
          </div>
          @endif
        </div>
        <div class="p-6 rounded-2xl bg-gradient-to-br from-green-800/30 to-green-600/10 border border-green-500/20 shadow">
          <h3 class="text-xl font-semibold text-green-200">Status Pengajuan</h3>
          <p class="text-3xl font-bold text-green-300 mt-2">{{ $statusPengajuan }}</p>
        </div>
      </div>
    </section>

    {{-- Riwayat Gaji (Card Layout) --}}
    <section id="gaji" class="px-4 py-6 sm:px-6 lg:px-8">
      <h2 class="text-xl sm:text-2xl font-bold text-white mb-4 sm:mb-6">Riwayat Gaji</h2>
      <div class="grid gap-4 sm:gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($riwayatGaji as $gaji)
        <div class="backdrop-blur-sm border border-blue-600 rounded-xl p-4 sm:p-5 shadow-lg hover:shadow-xl transition-shadow duration-200">
          <div class="flex justify-between items-center mb-3">
            <h3 class="text-base sm:text-lg font-semibold text-white">{{ $gaji->bulan }}</h3>
            <span class="px-2.5 py-1 rounded-full text-xs sm:text-sm font-medium {{ $gaji->status == 'Sudah Dibayar' ? 'bg-green-600/30 text-green-300' : 'bg-yellow-600/30 text-yellow-300' }}">
              {{ $gaji->status }}
            </span>
          </div>
          <div class="space-y-2 text-sm sm:text-base">
            <div class="flex justify-between">
              <span class="text-blue-200">Gaji Pokok</span>
              <span class="text-blue-300">Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
              <span class="text-blue-200">Tunjangan</span>
              <span class="text-green-300">Rp {{ number_format($gaji->tunjangan, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
              <span class="text-blue-200">Potongan</span>
              <span class="text-red-300">Rp {{ number_format($gaji->potongan, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between font-semibold">
              <span class="text-blue-100">Total</span>
              <span class="text-blue-100">Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</span>
            </div>
          </div>
        </div>
        @empty
        <div class="col-span-full p-4 sm:p-5 text-center text-blue-300 italic text-sm sm:text-base bg-blue-900/20 rounded-xl border border-blue-600">
          Belum ada data gaji.
        </div>
        @endforelse
      </div>
    </section>

    {{-- Pengajuan --}}
    <section id="pengajuan" class="hidden">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-extrabold text-white">Pengajuan</h2>
        <a href="{{ route('pengajuan.create') }}" class="bg-blue-600 hover:bg-blue-700 transition px-6 py-2 text-white rounded-xl shadow">
          + Buat Pengajuan
        </a>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($pengajuan as $p)
        <div class="bg-white/5 p-6 rounded-2xl border border-blue-800 backdrop-blur-lg">
          <div class="flex justify-between items-start mb-4">
            <div>
              <h3 class="text-blue-200 font-semibold text-lg">{{ $p->judul }}</h3>
              <p class="text-white text-sm">Oleh: {{ $p->user->name }}</p>
              <p class="text-blue-300 text-xs">{{ $p->created_at->format('d M Y') }}</p>
            </div>
            <span class="px-3 py-1 text-sm rounded-full {{ 
              $p->status == 'diterima' ? 'bg-green-500/20 text-green-300' : 
              ($p->status == 'ditolak' ? 'bg-red-500/20 text-red-300' : 
              'bg-yellow-500/20 text-yellow-300') }}">
              {{ ucfirst($p->status) }}
            </span>
          </div>
          <p class="text-blue-300 text-sm">{{ $p->deskripsi }}</p>
        </div>
        @empty
        <div class="col-span-2 text-center text-blue-300 italic">
          Belum ada pengajuan yang dibuat.
        </div>
        @endforelse
      </div>
    </section>

    {{-- Profil --}}
    <section id="profil" class="hidden">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-extrabold text-white">Profil</h2>
        <a href="{{ route('profile.edit') }}" class="bg-blue-600 hover:bg-blue-700 transition px-6 py-2 text-white rounded-xl shadow">
          Edit Profil
        </a>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white/5 p-6 rounded-2xl border border-blue-800 backdrop-blur-lg">
          <h3 class="text-blue-200 font-semibold text-lg mb-1">Nama</h3>
          <p class="text-blue-300">{{ $user->name }}</p>
        </div>
        <div class="bg-white/5 p-6 rounded-2xl border border-blue-800 backdrop-blur-lg">
          <h3 class="text-blue-200 font-semibold text-lg mb-1">Email</h3>
          <p class="text-blue-300">{{ $user->email }}</p>
        </div>
      </div>
    </section>

  </main>
</div>

{{-- Script tetap --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const sidebarLinks = document.querySelectorAll('#sidebar a[href*="#"]');
    const mainSections = document.querySelectorAll('main section');
    const userBaseUrl = "{{ route('user') }}";

    function setActiveLink(activeLink) {
      sidebarLinks.forEach(link => {
        link.classList.remove('bg-blue-500/20', 'text-blue-400');
        link.classList.add('text-blue-200');
      });
      if (activeLink) {
        activeLink.classList.remove('text-blue-200');
        activeLink.classList.add('bg-blue-500/20', 'text-blue-400');
      }
    }

    function showSection(targetId) {
      mainSections.forEach(section => section.classList.add('hidden'));
      const targetSection = document.getElementById(targetId);
      if (targetSection) targetSection.classList.remove('hidden');
    }

    sidebarLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href.startsWith(userBaseUrl + "#") || href.startsWith("#")) {
          e.preventDefault();
          const fragment = href.split('#')[1];
          if (fragment) {
            showSection(fragment);
            setActiveLink(this);
            history.pushState(null, null, '#' + fragment);
          }
        }
      });
    });

    function handleInitialHash() {
      const currentHash = window.location.hash.substring(1);
      if (currentHash) {
        showSection(currentHash);
        const activeLink = document.querySelector(`#sidebar a[href$="#${currentHash}"]`);
        setActiveLink(activeLink);
      } else {
        showSection('dashboard');
        const dashboardLink = document.querySelector(`#sidebar a[href$="#dashboard"]`);
        setActiveLink(dashboardLink);
      }
    }

    handleInitialHash();
    window.addEventListener('hashchange', handleInitialHash);
  });
</script>
@endsection