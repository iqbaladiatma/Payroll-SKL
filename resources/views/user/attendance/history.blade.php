<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Absensi') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <!-- Check In/Out Buttons -->
          <div class="mb-6 flex space-x-4">
            <form action="{{ route('attendance.check-in') }}" method="POST">
              @csrf
              <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Check In
              </button>
            </form>

            <form action="{{ route('attendance.check-out') }}" method="POST">
              @csrf
              <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Check Out
              </button>
            </form>
          </div>

          <!-- Attendance History -->
          <h3 class="text-lg font-semibold mb-4">Riwayat Absensi</h3>
          <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
              <thead>
                <tr>
                  <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Tanggal</th>
                  <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Check In</th>
                  <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Check Out</th>
                  <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($attendances as $attendance)
                <tr>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                    {{ $attendance->date->format('d/m/Y') }}
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                    {{ $attendance->check_in->format('H:i') }}
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                    {{ $attendance->check_out ? $attendance->check_out->format('H:i') : '-' }}
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $attendance->status === 'present' ? 'bg-green-100 text-green-800' : 
                                               ($attendance->status === 'late' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                      {{ ucfirst($attendance->status) }}
                    </span>
                  </td>
                </tr>
                @endforeach
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
</x-app-layout>