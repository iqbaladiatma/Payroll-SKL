<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
  public function checkIn()
  {
    $user = Auth::user();
    $today = Carbon::today();

    // Check if user already checked in today
    $existingAttendance = Attendance::where('user_id', $user->id)
      ->whereDate('date', $today)
      ->first();

    if ($existingAttendance) {
      return redirect()->back()->with('error', 'Anda sudah melakukan absensi hari ini.');
    }

    // Determine if late (after 9 AM)
    $status = Carbon::now()->hour >= 9 ? 'late' : 'present';

    Attendance::create([
      'user_id' => $user->id,
      'date' => $today,
      'check_in' => Carbon::now(),
      'status' => $status
    ]);

    return redirect()->back()->with('success', 'Absensi berhasil dicatat.');
  }

  public function checkOut()
  {
    $user = Auth::user();
    $today = Carbon::today();

    $attendance = Attendance::where('user_id', $user->id)
      ->whereDate('date', $today)
      ->first();

    if (!$attendance) {
      return redirect()->back()->with('error', 'Anda belum melakukan absensi masuk hari ini.');
    }

    if ($attendance->check_out) {
      return redirect()->back()->with('error', 'Anda sudah melakukan absensi pulang hari ini.');
    }

    $attendance->update([
      'check_out' => Carbon::now()
    ]);

    return redirect()->back()->with('success', 'Absensi pulang berhasil dicatat.');
  }

  public function index()
  {
    if (Auth::user()->usertype !== 'admin') {
      return redirect()->route('user');
    }

    $attendances = Attendance::with('user')
      ->orderBy('date', 'desc')
      ->orderBy('check_in', 'desc')
      ->paginate(10);

    return view('admin.attendance.index', compact('attendances'));
  }

  public function userAttendance()
  {
    $user = Auth::user();
    $today = Carbon::today();

    $todayAttendance = Attendance::where('user_id', $user->id)
      ->whereDate('date', $today)
      ->first();

    return view('user.attendance.index', compact('todayAttendance'));
  }
}
