@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-blue-900 to-gray-900 flex">
  @include('layouts.sidebar')

  <main class="flex-1 p-6 lg:p-8">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
      <div>
        <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-cyan-300" data-aos="fade-up">
          Pengajuan
        </h1>
        <p class="mt-2 text-blue-200/80" data-aos="fade-down">Kelola pengajuan sistem</p>
      </div>
      <a href="{{ route('pengajuan.create') }}" class="flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-lg transition-all shadow-md hover:shadow-lg">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        Buat Pengajuan Baru
      </a>
    </div>

    <!-- Pengajuan Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
      @foreach($pengajuan as $p)
      <div class="group bg-gradient-to-br from-white/5 to-transparent p-6 rounded-xl border border-blue-800/50 backdrop-blur-sm hover:border-blue-600/50 transition-all duration-300 shadow-lg hover:shadow-xl">
        <div class="flex flex-col h-full">
          <!-- Header Section -->
          <div class="flex justify-between items-start mb-4">
            <div class="flex-1">
              <h3 class="text-lg font-semibold text-blue-100 mb-2">{{ $p->judul }}</h3>
              <div class="flex items-center gap-2 text-sm text-blue-300/80">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>{{ $p->user->name }}</span>
                <span class="mx-1">•</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>{{ \Carbon\Carbon::parse($p->tanggal_pengajuan)->translatedFormat('d M Y H:i') }}</span>
              </div>
            </div>

            <div class="flex items-center gap-2">
              <span class="px-3 py-1 rounded-full text-sm font-medium {{ $p->status == 'diterima' ? 'bg-emerald-500/20 text-emerald-400' : ($p->status == 'ditolak' ? 'bg-rose-500/20 text-rose-400' : 'bg-amber-500/20 text-amber-400') }}">
                {{ $p->status }}
              </span>
              @if(auth()->user()->usertype === 'admin')
              <form action="{{ route('pengajuan.destroy', $p->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-rose-400 hover:text-rose-300 transition-colors" title="Hapus">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </form>
              @endif
            </div>
          </div>

          <!-- Content Section -->
          <div class="mb-5 flex-1">
            <p class="text-blue-300/90 leading-relaxed line-clamp-3">
              {{ $p->deskripsi }}
            </p>
          </div>

          <!-- Admin Actions -->
          @if(auth()->user()->usertype === 'admin')
          <div class="mt-auto pt-4 border-t border-blue-800/30">
            <div class="flex gap-3 justify-end">
              <form action="{{ route('pengajuan.status', $p->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="diterima">
                <button type="submit" class="flex items-center gap-2 bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-400 px-4 py-2 rounded-lg transition-colors">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  Terima
                </button>
              </form>

              <form action="{{ route('pengajuan.status', $p->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="ditolak">
                <button type="submit" class="flex items-center gap-2 bg-rose-500/20 hover:bg-rose-500/30 text-rose-400 px-4 py-2 rounded-lg transition-colors">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                  Tolak
                </button>
              </form>
            </div>
          </div>
          @endif
        </div>
      </div>
      @endforeach

      @if($pengajuan->isEmpty())
      <div class="col-span-full p-8 text-center text-blue-300/70">
        <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <p class="text-lg">Belum ada pengajuan</p>
      </div>
      @endif
    </div>
  </main>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const sidebarLinks = document.querySelectorAll('#sidebar a[href*="#"]');
    const mainSections = document.querySelectorAll('main section');

    // Fungsi untuk mengubah tampilan section
    function showSection(targetId) {
      mainSections.forEach(section => {
        section.classList.add('hidden');
      });
      const targetSection = document.getElementById(targetId);
      if (targetSection) {
        targetSection.classList.remove('hidden');
      }
    }

    // Event listener untuk link sidebar
    sidebarLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href.startsWith(adminBaseUrl + "#") || href.startsWith("#")) {
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
  });
</script>
@endsection