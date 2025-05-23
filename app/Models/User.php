<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Gaji;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use  HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function karyawan()
    {
        return $this->hasOne(Datakaryawan::class);
    }

    public function gaji()
    {
        return $this->hasManyThrough(Gaji::class, Datakaryawan::class, 'user_id', 'datakaryawan_id');
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }

    public function isAdmin()
    {
        return $this->usertype === 'admin';
    }
}
