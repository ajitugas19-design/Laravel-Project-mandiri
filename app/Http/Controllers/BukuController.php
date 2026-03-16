<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        $kategori = Kategori::all();
        return view('buku.index', compact('buku', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'deskripsi' => 'required',
            'cover' => 'image|nullable',
            'file_buku' => 'file|nullable',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        $data = $request->all();
        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }
        if ($request->hasFile('file_buku')) {
            $data['file_buku'] = $request->file('file_buku')->store('buku', 'public');
        }

        Buku::create($data);

        return redirect('/tampilan-awal')->with('success', 'Buku berhasil ditambah');
    }

    // Tambah method edit, update, delete nanti
}

