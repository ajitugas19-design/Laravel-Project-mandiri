<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'foto',
        'deskripsi',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function bukuTersimpan()
    {
        return $this->hasMany(BukuTersimpan::class, 'id_user');
    }

    public function ratingBuku()
    {
        return $this->hasMany(RatingBuku::class, 'id_user');
    }

    public function riwayatBaca()
    {
        return $this->hasMany(RiwayatBaca::class, 'id_user');
    }
}

