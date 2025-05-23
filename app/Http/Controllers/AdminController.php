<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Datakaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $months = collect();
        $counts = collect();

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $months->push($date->format('M Y'));
            $counts->push(
                Datakaryawan::whereMonth('created_at', $date->month)
                    ->whereYear('created_at', $date->year)
                    ->count()
            );
        }

        $totalGaji = Gaji::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_gaji');

        return view('admin.dashboard', [
            'totalKaryawan' => Datakaryawan::count(),
            'totalPengajuan' => Pengajuan::where('status', 'menunggu')->count(),
            'totalGaji' => $totalGaji,
            'karyawan' => Datakaryawan::latest()->get(),
            'pengajuan' => Pengajuan::with('user')->latest()->get()
        ]);
    }
}
