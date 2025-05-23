<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Datakaryawan extends Model
{
    use HasFactory;
    protected $table = 'datakaryawans';

    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'no_hp',
        'alamat',
        'jabatan',
        'tanggal_masuk',
        'gaji_pokok',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gaji()
    {
        return $this->hasMany(Gaji::class, 'datakaryawan_id');
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'user_id', 'user_id');
    }
}
