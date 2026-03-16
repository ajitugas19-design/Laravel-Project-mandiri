<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    public $timestamps = false; // No Laravel timestamps

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'deskripsi',
        'cover',
        'file_buku',
        'barcode',
        'id_kategori',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function bukuTersimpan()
    {
        return $this->hasMany(BukuTersimpan::class, 'id_buku');
    }

    public function ratingBuku()
    {
        return $this->hasMany(RatingBuku::class, 'id_buku');
    }
}

