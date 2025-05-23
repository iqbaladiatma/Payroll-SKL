@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row min-h-screen bg-gradient-to-br from-gray-900 to-blue-900">
  <!-- Sidebar -->
  <aside id="sidebar" class="w-64 bg-white/5 backdrop-blur-lg border-r border-blue-800 p-6 hidden md:block">
    <h1 class="text-2xl font-bold text-blue-400 mb-8">HRM System</h1>
    <ul class="space-y-3">
      <li>
        <a href="{{ route('admin') }}" class="block py-3 px-4 text-blue-200 hover:bg-blue-500/20 rounded-xl transition-all">
          📊 Dashboard
        </a>
      </li>
      <li>
        <a href="{{ route('karyawan.index') }}" class="block py-3 px-4 text-blue-200 hover:bg-blue-500/20 rounded-xl transition-all bg-blue-500/20">
          👥 Data Karyawan
        </a>
      </li>
      <li>
        <a href="{{ route('gaji.index') }}" class="block py-3 px-4 text-blue-200 hover:bg-blue-500/20 rounded-xl transition-all">
          💰 Penggajian
        </a>
      </li>
      <li>
        <a href="{{ route('pengajuan.index') }}" class="block py-3 px-4 text-blue-200 hover:bg-blue-500/20 rounded-xl transition-all">
          📨 Pengajuan
        </a>
      </li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6">
    @if (session('success'))
    <div class="bg-blue-500/20 text-blue-200 p-4 rounded-xl mb-6 border border-blue-500/30">
      {{ session('success') }}
    </div>
    @endif

    <div class="flex justify-between items-center mb-8">
      <h2 class="text-3xl font-bold text-blue-100">Data Karyawan</h2>
      <button onclick="toggleModal('tambah-karyawan')" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl">
        + Tambah Karyawan
      </button>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-blue-800 backdrop-blur-lg">
      <table class="w-full">
        <thead class="bg-blue-500/20">
          <tr>
            <th class="px-6 py-4 text-left text-blue-200">Nama</th>
            <th class="px-6 py-4 text-left text-blue-200">NIK</th>
            <th class="px-6 py-4 text-left text-blue-200">Email</th>
            <th class="px-6 py-4 text-left text-blue-200">Jabatan</th>
            <th class="px-6 py-4 text-left text-blue-200">Status</th>
            <th class="px-6 py-4 text-left text-blue-200">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($karyawan as $k)
          <tr class="border-t border-blue-800 hover:bg-blue-500/10">
            <td class="px-6 py-4 text-blue-200">{{ $k->nama }}</td>
            <td class="px-6 py-4 text-blue-300">{{ $k->nik }}</td>
            <td class="px-6 py-4 text-blue-300">{{ $k->email }}</td>
            <td class="px-6 py-4 text-blue-300">{{ $k->jabatan }}</td>
            <td class="px-6 py-4">
              <span class="px-3 py-1 rounded-full {{ $k->status == 'aktif' ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                {{ $k->status }}
              </span>
            </td>
            <td class="px-6 py-4 flex gap-2">
              <button onclick="toggleModal('edit-karyawan', '{{ $k->id }}')" class="text-blue-400 hover:text-blue-300">
                ✏️ Edit
              </button>
              <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="text-red-400 hover:text-red-300">
                  🗑️ Hapus
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>
</div>

<!-- Modal Form -->
<div id="modal-karyawan" class="fixed inset-0 bg-black/50 hidden items-center justify-center">
  <div class="bg-white/5 backdrop-blur-lg rounded-2xl border border-blue-800 p-6 w-full max-w-lg">
    <h3 class="text-2xl font-bold text-blue-100 mb-6" id="modal-title"></h3>
    <form id="karyawan-form" method="POST">
      @csrf
      <div class="space-y-4">
        <input type="text" name="nama" placeholder="Nama Lengkap" class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200">
        <input type="text" name="nik" placeholder="NIK" class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200">
        <input type="email" name="email" placeholder="Email" class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200">
        <input type="text" name="no_hp" placeholder="No. HP" class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200">
        <textarea name="alamat" placeholder="Alamat" class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200"></textarea>
        <select name="jabatan" class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200">
          <option value="Staff">Staff</option>
          <option value="Manager">Manager</option>
          <option value="Supervisor">Supervisor</option>
        </select>
        <input type="date" name="tanggal_masuk" class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200">
        <input type="number" name="gaji_pokok" placeholder="Gaji Pokok" class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200">
        <select name="status" class="w-full bg-white/5 border border-blue-800 rounded-xl p-3 text-blue-200">
          <option value="aktif">Aktif</option>
          <option value="tidak aktif">Tidak Aktif</option>
        </select>
        <div class="flex gap-4">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl flex-1">
            Simpan
          </button>
          <button type="button" onclick="toggleModal('karyawan')" class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-xl flex-1">
            Batal
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  function toggleModal(modalType, id = null) {
    const modal = document.getElementById('modal-karyawan');
    const form = document.getElementById('karyawan-form');
    const modalTitle = document.getElementById('modal-title');

    if (modalType === 'tambah-karyawan') {
      form.action = "{{ route('karyawan.store') }}";
      form.reset();
      modalTitle.textContent = 'Tambah Karyawan';
    } else if (modalType === 'edit-karyawan' && id) {
      form.action = `/karyawan/${id}`;
      modalTitle.textContent = 'Edit Karyawan';
      // Here you would typically fetch and populate the form data
      // For now, we'll just show the modal
    }

    modal.classList.toggle('hidden');
    modal.classList.toggle('flex');
  }

  // Close modal when clicking outside
  document.getElementById('modal-karyawan').addEventListener('click', function(e) {
    if (e.target === this) {
      toggleModal('karyawan');
    }
  });
</script>
@endsection