<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingBuku extends Model
{
    protected $table = 'rating_buku';
    protected $primaryKey = 'id_rating';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_buku',
        'rating',
        'komentar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}

