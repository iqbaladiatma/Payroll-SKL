<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuans';

    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'status',
        'tanggal_pengajuan',
        'tanggal_respon'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
