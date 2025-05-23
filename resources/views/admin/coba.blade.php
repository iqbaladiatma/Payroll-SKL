biar keren kasih fitur apa lagi ini @extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-blue-900 to-gray-900 flex">
    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Main Content --}}
    <main class="flex-1 p-6 lg:p-8">
        {{-- Judul Dashboard --}}
        <section id="dashboard">
            <div class="mb-10 text-center">
                <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-cyan-300 mb-4">
                    Halo, Selamat Datang Admin!
                </h1>
                <p class="text-blue-200/80">Kelola data karyawan dan pengajuan dengan mudah</p>
            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-12">
                {{-- Total Karyawan --}}
                <div class="bg-gradient-to-br from-blue-500/20 to-cyan-500/10 p-6 rounded-xl border border-blue-500/30 backdrop-blur-sm hover:backdrop-blur transition-all duration-300 shadow-lg hover:shadow-xl">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-blue-500/20 rounded-lg">
                            <svg class="w-8 h-8 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-blue-300/80 mb-1">Total Karyawan</h3>
                            <p class="text-3xl font-bold text-blue-100">{{ $totalKaryawan }}</p>
                        </div>
                    </div>
                </div>

                {{-- Total Pengajuan --}}
                <div class="bg-gradient-to-br from-green-500/20 to-emerald-500/10 p-6 rounded-xl border border-green-500/30 backdrop-blur-sm hover:backdrop-blur transition-all duration-300 shadow-lg hover:shadow-xl">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-green-500/20 rounded-lg">
                            <svg class="w-8 h-8 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-green-300/80 mb-1">Pengajuan Baru</h3>
                            <p class="text-3xl font-bold text-green-100">{{ $totalPengajuan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Data Karyawan --}}
        <section id="karyawan" class="space-y-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
                <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-cyan-200">
                    Data Karyawan
                </h2>
                <a href="{{ route('karyawan.create') }}" class="flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-5 py-2.5 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Karyawan
                </a>
            </div>

            <div class="bg-white/5 rounded-xl border border-blue-800/50 backdrop-blur-sm shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-blue-500/10">
                            <tr>
                                <th class="px-5 py-4 text-left text-sm font-medium text-blue-300/90">Nama</th>
                                <th class="px-5 py-4 text-left text-sm font-medium text-blue-300/90">Jabatan</th>
                                <th class="px-5 py-4 text-left text-sm font-medium text-blue-300/90">Status</th>
                                <th class="px-5 py-4 text-left text-sm font-medium text-blue-300/90">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-blue-800/50">
                            @foreach($karyawan as $k)
                            <tr class="hover:bg-blue-500/5 transition-colors duration-200">
                                <td class="px-5 py-4 text-blue-100 font-medium">{{ $k->nama }}</td>
                                <td class="px-5 py-4 text-blue-200">{{ $k->jabatan }}</td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $k->status == 'aktif' ? 'bg-green-500/20 text-green-400' : 'bg-rose-500/20 text-rose-400' }}">
                                        <span class="w-2 h-2 rounded-full mr-2 {{ $k->status == 'aktif' ? 'bg-green-400' : 'bg-rose-400' }}"></span>
                                        {{ ucfirst($k->status) }}
                                    </span>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('karyawan.edit', $k->id) }}" class="text-blue-400 hover:text-blue-300 transition-colors" title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M4 13.5V20h6.5l10.036-10.036a2.5 2.5 0 00-3.536-3.536L4 13.5z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-rose-400 hover:text-rose-300 transition-colors" title="Hapus">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        {{-- End Karyawan --}}


        <!-- Section Pengajuan -->
        <section id="pengajuan" class="hidden space-y-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
                <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-cyan-200">
                    Daftar Pengajuan
                </h2>
                <a href="{{ route('pengajuan.create') }}" class="flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-5 py-2.5 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Buat Pengajuan
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                @foreach($pengajuan as $p)
                <div class="group bg-white/5 p-6 rounded-xl border border-blue-800/50 backdrop-blur-sm hover:border-blue-600/50 transition-all duration-300 shadow-lg hover:shadow-xl">
                    <div class="flex justify-between items-start mb-4">
                        <div class="space-y-1">
                            <h3 class="text-lg font-semibold text-blue-100">{{ $p->judul }}</h3>
                            <div class="text-sm text-blue-300/80">
                                <span class="font-medium">{{ $p->user->name }}</span>
                                <span class="mx-2">•</span>
                                <time>{{ $p->created_at->translatedFormat('d M Y H:i') }}</time>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-1 rounded-full text-sm font-medium {{ $p->status == 'diterima' ? 'bg-green-500/20 text-green-400' : ($p->status == 'ditolak' ? 'bg-rose-500/20 text-rose-400' : 'bg-amber-500/20 text-amber-400') }}">
                                {{ $p->status }}
                            </span>
                            <form action="{{ route('pengajuan.destroy', $p->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-1 text-blue-400 hover:text-rose-400 transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <p class="text-blue-300/80 mb-5 leading-relaxed">{{ Str::limit($p->deskripsi, 120) }}</p>

                    @if($p->status == 'menunggu')
                    <div class="flex gap-3">
                        <form action="{{ route('pengajuan.update', $p->id) }}" method="POST" class="flex-1">
                            @csrf @method('PUT')
                            <input type="hidden" name="status" value="diterima">
                            <button type="submit" class="w-full flex items-center justify-center gap-2 bg-green-500/20 text-green-400 px-4 py-2 rounded-lg hover:bg-green-500/30 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Terima
                            </button>
                        </form>

                        <form action="{{ route('pengajuan.update', $p->id) }}" method="POST" class="flex-1">
                            @csrf @method('PUT')
                            <input type="hidden" name="status" value="ditolak">
                            <button type="submit" class="w-full flex items-center justify-center gap-2 bg-rose-500/20 text-rose-400 px-4 py-2 rounded-lg hover:bg-rose-500/30 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Tolak
                            </button>
                        </form>
                    </div>
                    @endif
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
        </section>
    </main>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarLinks = document.querySelectorAll('#sidebar a[href*="#"]');
        const mainSections = document.querySelectorAll('main section');
        const adminBaseUrl = "{{ route('admin') }}";

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
            mainSections.forEach(section => {
                section.classList.add('hidden');
            });
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.classList.remove('hidden');
            }
        }

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

    function toggleModal(modalType, id = null, data = null) {
        const pengajuanModal = document.getElementById('modal-pengajuan');
        const pengajuanForm = document.getElementById('pengajuan-form');
        const pengajuanModalTitle = document.getElementById('modal-title-pengajuan');

        if (modalType === 'buat-pengajuan') {
            if (pengajuanModalTitle) pengajuanModalTitle.textContent = 'Buat Pengajuan';
            if (pengajuanForm) {
                pengajuanForm.reset();
                pengajuanForm.action = "{{ route('pengajuan.store') }}";
            }
            if (pengajuanModal) pengajuanModal.classList.remove('hidden');
            if (pengajuanModal) pengajuanModal.classList.add('flex');
        } else if (modalType === 'pengajuan-close') {
            if (pengajuanModal) pengajuanModal.classList.add('hidden');
            if (pengajuanModal) pengajuanModal.classList.remove('flex');
        }
    }
</script>
@endsection