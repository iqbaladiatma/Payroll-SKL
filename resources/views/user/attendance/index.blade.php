@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-blue-950">
  <div class="flex flex-col md:flex-row min-h-screen">
    @include('layouts.sidebar')

    <!-- Main Content -->
    <div class="flex-1 p-8">
      <div class="bg-white/5 backdrop-blur-lg rounded-xl p-6">
        <h2 class="text-2xl font-bold text-blue-400 mb-6">Absensi</h2>

        <!-- Status Absensi Hari Ini -->
        <div class="mb-8">
          <h3 class="text-lg font-semibold mb-4 text-blue-200">Status Absensi Hari Ini</h3>
          @if($todayAttendance)
          <div class="bg-blue-900/50 p-4 rounded-lg border border-blue-800">
            <p class="text-blue-200">
              <span class="font-semibold">Check In:</span>
              {{ $todayAttendance->check_in->format('H:i') }}
              @if($todayAttendance->status === 'late')
              <span class="text-yellow-400">(Terlambat)</span>
              @endif
            </p>
            <p class="text-blue-200 mt-2">
              <span class="font-semibold">Check Out:</span>
              {{ $todayAttendance->check_out ? $todayAttendance->check_out->format('H:i') : 'Belum Check Out' }}
            </p>
          </div>
          @else
          <div class="bg-yellow-900/50 p-4 rounded-lg border border-yellow-800">
            <p class="text-yellow-200">Anda belum melakukan absensi hari ini</p>
          </div>
          @endif
        </div>

        <!-- Tombol Absensi -->
        <div class="flex space-x-4">
          @if(!$todayAttendance)
          <form action="{{ route('attendance.check-in') }}" method="POST">
            @csrf
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition-all">
              Check In
            </button>
          </form>
          @elseif(!$todayAttendance->check_out)
          <form action="{{ route('attendance.check-out') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition-all">
              Check Out
            </button>
          </form>
          @else
          <div class="bg-green-900/50 p-4 rounded-lg border border-green-800">
            <p class="text-green-200">Absensi hari ini sudah selesai</p>
          </div>
          @endif
        </div>

        @if(session('success'))
        <div class="mt-4 bg-green-900/50 border border-green-800 text-green-200 px-4 py-3 rounded-lg">
          {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="mt-4 bg-red-900/50 border border-red-800 text-red-200 px-4 py-3 rounded-lg">
          {{ session('error') }}
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection