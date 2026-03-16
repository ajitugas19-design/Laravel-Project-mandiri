<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuTersimpan extends Model
{
    protected $table = 'buku_tersimpan';
    protected $primaryKey = 'id_simpan';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}

