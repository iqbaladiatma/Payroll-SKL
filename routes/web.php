<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about', function () {
    return view('aboutus');
});

// Admin Routes
Route::middleware(['auth', 'AdminMiddleware'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('gaji', GajiController::class);
    Route::put('pengajuan/{pengajuan}/status', [PengajuanController::class, 'updateStatus'])->name('pengajuan.status');
    Route::put('gaji/{gaji}/status', [GajiController::class, 'updateStatus'])->name('gaji.updateStatus');
    Route::get('/admin/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');
    Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create');
    Route::get('/pengajuan/{pengajuan}', [PengajuanController::class, 'show'])->name('pengajuan.show');
    Route::get('/pengajuan/{pengajuan}/edit', [PengajuanController::class, 'edit'])->name('pengajuan.edit');
    Route::put('/pengajuan/{pengajuan}', [PengajuanController::class, 'updateStatus'])->name('pengajuan.update');
    Route::delete('/pengajuan/{pengajuan}', [PengajuanController::class, 'destroy'])->name('pengajuan.destroy');
    Route::get('/user/attendance', [AttendanceController::class, 'userAttendance'])->name('attendance.history');
    Route::post('/user/attendance/check-in', [AttendanceController::class, 'checkIn'])->name('attendance.check-in');
    Route::post('/user/attendance/check-out', [AttendanceController::class, 'checkOut'])->name('attendance.check-out');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Gaji routes
Route::middleware(['auth'])->group(function () {
    Route::get('/gaji', [GajiController::class, 'index'])->name('gaji.index');
    Route::post('/gaji', [GajiController::class, 'store'])->name('gaji.store');
    Route::put('/gaji/{gaji}', [GajiController::class, 'update'])->name('gaji.update');
    Route::delete('/gaji/{gaji}', [GajiController::class, 'destroy'])->name('gaji.destroy');
    Route::put('/gaji/{gaji}/status', [GajiController::class, 'updateStatus'])->name('gaji.status');
    Route::get('/gaji/{gaji}/kwitansi', [GajiController::class, 'downloadKwitansi'])->name('gaji.kwitansi');
});

require __DIR__ . '/auth.php';
