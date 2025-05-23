<?php

namespace App\Models;

use App\Models\Datakaryawan;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'gajis';

    protected $fillable = [
        'datakaryawan_id',
        'bulan',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji',
        'status',
    ];

    // Relationship to Datakaryawan model
    public function datakaryawan()
    {
        return $this->belongsTo(Datakaryawan::class, 'datakaryawan_id');
    }
}
