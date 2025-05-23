@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-blue-900 to-gray-900 flex">
  {{-- Sidebar --}}
  @include('layouts.sidebar')

  {{-- Main Content --}}
  <main class="flex-1 p-6 lg:p-8">
    <!-- Notifications -->
    @if (session('success'))
    <div class="relative bg-emerald-900/90 text-emerald-100 p-4 rounded-lg mb-6 border border-emerald-500/50 flex items-center shadow-lg transition-opacity duration-300">
      <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <div class="flex-1">{{ session('success') }}</div>
      <div class="absolute bottom-0 left-0 h-1 bg-emerald-500/30 animate-progress w-full origin-left"></div>
    </div>
    @endif

    @if (session('error'))
    <div class="relative bg-rose-900/90 text-rose-100 p-4 rounded-lg mb-6 border border-rose-500/50 flex items-center shadow-lg">
      <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
      </svg>
      <div class="flex-1">{{ session('error') }}</div>
    </div>
    @endif

    <!-- Header -->
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-cyan-300">
        Penggajian
      </h1>
      <p class="mt-2 text-blue-200/80">Kelola data penggajian karyawan</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
      <!-- Form Section -->
      <div class="bg-white/5 p-6 rounded-xl border border-blue-800/50 backdrop-blur-sm shadow-xl">
        <div class="flex items-center gap-3 mb-6">
          <div class="p-2 bg-blue-500/20 rounded-lg">
            <svg class="w-6 h-6 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
          </div>
          <h2 class="text-xl font-semibold text-blue-100" id="gaji-form-title">Input Gaji Bulanan</h2>
        </div>

        <form id="gaji-form" action="{{ route('gaji.store') }}" method="POST" class="space-y-5">
          @csrf
          <input type="hidden" name="_method" id="gaji-form-method" value="POST">
          <input type="hidden" name="gaji_id" id="gaji-id" value="">

          <!-- Form Inputs -->
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-blue-300/90 mb-2">Karyawan</label>
              <div class="relative">
                <select name="datakaryawan_id" id="gaji-datakaryawan_id" class="w-full bg-white/5 border border-blue-800/50 rounded-lg px-4 py-3 text-blue-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none">
                  <option value="">Pilih Karyawan...</option>
                  @foreach($karyawan as $k)
                  <option value="{{ $k->id }}" {{ old('datakaryawan_id') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama }} - {{ $k->jabatan }}
                  </option>
                  @endforeach
                </select>
                @error('datakaryawan_id')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                  <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </div>
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-blue-300/90 mb-2">Bulan</label>
              <input type="month" name="bulan" id="gaji-bulan"
                class="w-full bg-white/5 border border-blue-800/50 rounded-lg px-4 py-3 text-blue-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
              <div>
                <label class="block text-sm font-medium text-blue-300/90 mb-2">Gaji Pokok</label>
                <div class="relative">
                  <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-400">Rp</span>
                  <input type="number" name="gaji_pokok" id="gaji-gaji_pokok" placeholder="0"
                    class="w-full pl-10 bg-white/5 border border-blue-800/50 rounded-lg px-4 py-3 text-blue-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
              </div>

              <div>
                <label class="block text-sm font-medium text-blue-300/90 mb-2">Tunjangan</label>
                <div class="relative">
                  <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-400">Rp</span>
                  <input type="number" name="tunjangan" id="gaji-tunjangan" placeholder="0"
                    class="w-full pl-10 bg-white/5 border border-blue-800/50 rounded-lg px-4 py-3 text-blue-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
              </div>

              <div>
                <label class="block text-sm font-medium text-blue-300/90 mb-2">Potongan</label>
                <div class="relative">
                  <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-400">Rp</span>
                  <input type="number" name="potongan" id="gaji-potongan" placeholder="0"
                    class="w-full pl-10 bg-white/5 border border-blue-800/50 rounded-lg px-4 py-3 text-blue-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
              </div>
            </div>
          </div>

          <!-- Form Actions -->
          <div class="flex gap-3">
            <button type="submit" id="gaji-submit-button"
              class="flex-1 bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition-all flex items-center justify-center gap-2">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <span>Simpan Gaji</span>
            </button>

            <button type="button" id="gaji-cancel-edit-button" onclick="resetGajiForm()"
              class="bg-gray-500/20 hover:bg-gray-500/30 text-blue-200 px-4 py-3 rounded-lg transition-all hidden items-center gap-2">
              Batal
            </button>
          </div>
        </form>
      </div>

      <!-- Salary History -->
      <div class="lg:col-span-2">
        <div class="bg-white/5 p-6 rounded-xl border border-blue-800/50 backdrop-blur-sm shadow-xl">
          <div class="flex items-center gap-3 mb-6">
            <div class="p-2 bg-blue-500/20 rounded-lg">
              <svg class="w-6 h-6 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
              </svg>
            </div>
            <h2 class="text-xl font-semibold text-blue-100">Riwayat Penggajian</h2>
          </div>

          <div class="space-y-6">
            @forelse($gaji as $bulan => $gajiBulan)
            <div class="bg-white/5 p-5 rounded-xl border border-blue-800/50 shadow-lg">
              <h3 class="text-lg font-semibold text-blue-200 mb-4">
                {{ \Carbon\Carbon::createFromFormat('Y-m', $bulan)->isoFormat('MMMM YYYY') }}
              </h3>

              <div class="space-y-4">
                @foreach($gajiBulan as $g)
                <div class="group bg-white/5 p-4 rounded-lg border border-blue-800/30 hover:border-blue-600/50 transition-colors">
                  <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex-1">
                      @if($g->datakaryawan)
                      <h4 class="text-blue-100 font-semibold">{{ $g->datakaryawan->nama }}</h4>
                      <p class="text-blue-300/80 text-sm">{{ $g->datakaryawan->jabatan }}</p>
                      @else
                      <h4 class="text-rose-400 font-semibold">Karyawan (ID: {{ $g->user_id }}) Tidak Ditemukan</h4>
                      @endif
                    </div>

                    <div class="text-right">
                      <p class="text-lg font-bold text-blue-300">
                        Rp {{ number_format($g->total_gaji, 0, ',', '.') }}
                      </p>
                      <div class="flex items-center gap-2 mt-2 justify-end">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-sm font-medium {{ $g->status == 'Sudah Dibayar' ? 'bg-emerald-500/20 text-emerald-400' : 'bg-amber-500/20 text-amber-400' }}">
                          <span class="w-2 h-2 rounded-full mr-2 {{ $g->status == 'Sudah Dibayar' ? 'bg-emerald-400' : 'bg-amber-400' }}"></span>
                          {{ $g->status }}
                        </span>
                        @if($g->status == 'Belum Dibayar')
                        <form action="{{ route('gaji.status', $g->id) }}" method="POST">
                          @csrf @method('PUT')
                          <button type="submit" class="text-xs bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 px-3 py-1.5 rounded-md flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Bayar
                          </button>
                        </form>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="mt-4 pt-3 border-t border-blue-800/30 flex items-center justify-end gap-3">
                    <button onclick="editGaji({{ json_encode($g) }})"
                      class="text-blue-400 hover:text-blue-300 text-sm flex items-center gap-1">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                      </svg>
                      Edit
                    </button>

                    <form action="{{ route('gaji.destroy', $g->id) }}" method="POST"
                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data gaji ini?')">
                      @csrf @method('DELETE')
                      <button type="submit" class="text-rose-400 hover:text-rose-300 text-sm flex items-center gap-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus
                      </button>
                    </form>

                    <a href="{{ route('gaji.kwitansi', $g->id) }}" class="text-blue-400 hover:text-blue-300 text-sm flex items-center gap-1">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                      </svg>
                      Download Kwitansi
                    </a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            @empty
            <div class="p-8 text-center text-blue-300/70">
              <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <p class="text-lg">Belum ada riwayat gaji</p>
            </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

<script>
  const gajiForm = document.getElementById('gaji-form');
  const gajiFormTitle = document.getElementById('gaji-form-title');
  const gajiFormMethodInput = document.getElementById('gaji-form-method');
  const gajiIdInput = document.getElementById('gaji-id');
  const gajiDatakaryawanIdSelect = document.getElementById('gaji-datakaryawan_id');
  const gajiBulanInput = document.getElementById('gaji-bulan');
  const gajiGajiPokokInput = document.getElementById('gaji-gaji_pokok');
  const gajiTunjanganInput = document.getElementById('gaji-tunjangan');
  const gajiPotonganInput = document.getElementById('gaji-potongan');
  const gajiSubmitButton = document.getElementById('gaji-submit-button');
  const gajiCancelEditButton = document.getElementById('gaji-cancel-edit-button');

  const originalFormAction = gajiForm.action;
  const originalFormTitle = gajiFormTitle.textContent;
  const originalSubmitButtonText = gajiSubmitButton.textContent;

  function editGaji(gajiData) {
    gajiFormTitle.textContent = 'Edit Gaji Bulanan';
    gajiForm.action = "{{ url('gaji') }}/" + gajiData.id;
    gajiFormMethodInput.value = 'PUT';
    gajiIdInput.value = gajiData.id;

    gajiDatakaryawanIdSelect.value = gajiData.datakaryawan_id;
    gajiBulanInput.value = gajiData.bulan;
    gajiGajiPokokInput.value = gajiData.gaji_pokok;
    gajiTunjanganInput.value = gajiData.tunjangan;
    gajiPotonganInput.value = gajiData.potongan;

    gajiSubmitButton.textContent = 'Update Gaji';
    gajiCancelEditButton.classList.remove('hidden');

    // Scroll to form for better UX
    gajiForm.scrollIntoView({
      behavior: 'smooth'
    });
  }

  function resetGajiForm() {
    gajiFormTitle.textContent = originalFormTitle;
    gajiForm.action = originalFormAction;
    gajiFormMethodInput.value = 'POST';
    gajiIdInput.value = '';
    gajiForm.reset(); // Resets form fields to their initial values
    gajiSubmitButton.textContent = originalSubmitButtonText;
    gajiCancelEditButton.classList.add('hidden');
  }
</script>
@endsection