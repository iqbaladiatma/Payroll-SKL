@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-blue-950">
  <div class="flex flex-col md:flex-row min-h-screen">
    @include('layouts.sidebar')

    <!-- Main Content -->
    <div class="flex-1 p-8">
      <div class="bg-white/5 backdrop-blur-lg rounded-xl p-6">
        <h2 class="text-2xl font-bold text-blue-400 mb-6">Riwayat Absensi</h2>

        <div class="overflow-x-auto">
          <table class="min-w-full">
            <thead>
              <tr>
                <th class="px-6 py-3 border-b border-blue-800 text-left text-sm font-semibold text-blue-200">Nama</th>
                <th class="px-6 py-3 border-b border-blue-800 text-left text-sm font-semibold text-blue-200">Tanggal</th>
                <th class="px-6 py-3 border-b border-blue-800 text-left text-sm font-semibold text-blue-200">Check In</th>
                <th class="px-6 py-3 border-b border-blue-800 text-left text-sm font-semibold text-blue-200">Check Out</th>
                <th class="px-6 py-3 border-b border-blue-800 text-left text-sm font-semibold text-blue-200">Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse($attendances as $attendance)
              <tr class="hover:bg-blue-900/20">
                <td class="px-6 py-4 border-b border-blue-800 text-blue-200">
                  {{ $attendance->user->name }}
                </td>
                <td class="px-6 py-4 border-b border-blue-800 text-blue-200">
                  {{ $attendance->date->format('d/m/Y') }}
                </td>
                <td class="px-6 py-4 border-b border-blue-800 text-blue-200">
                  {{ $attendance->check_in->format('H:i') }}
                </td>
                <td class="px-6 py-4 border-b border-blue-800 text-blue-200">
                  {{ $attendance->check_out ? $attendance->check_out->format('H:i') : '-' }}
                </td>
                <td class="px-6 py-4 border-b border-blue-800">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $attendance->status === 'present' ? 'bg-green-900/50 text-green-200 border border-green-800' : 
                                           ($attendance->status === 'late' ? 'bg-yellow-900/50 text-yellow-200 border border-yellow-800' : 
                                           'bg-red-900/50 text-red-200 border border-red-800') }}">
                    {{ $attendance->status === 'present' ? 'Tepat Waktu' : 
                                           ($attendance->status === 'late' ? 'Terlambat' : 'Tidak Hadir') }}
                  </span>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="5" class="px-6 py-4 text-center text-blue-200">
                  Belum ada data absensi
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="mt-4">
          {{ $attendances->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection