@extends('layouts.sidebar')

@section('title', 'Buku Tersimpan')

@section('styles')
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

h2{
    text-align:center;
    margin-bottom:20px;
    color:#333;
}

.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(120px,1fr));
    gap:20px;
}

.card{
    background:white;
    border-radius:10px;
    overflow:hidden;
    text-align:center;
    color:black;
}

.card img{
    width:100%;
    height:100px;
    object-fit:cover;
}

.card p{
    background:#ddd;
    padding:5px;
    font-weight:bold;
}
</style>
@endsection

@section('content')
<h2>Buku Yang Tersimpan</h2>

<div class="grid">
    @forelse($bukuTersimpan as $item)
    <div class="card">
        <img src="https://picsum.photos/200?{{ $item->id }}" alt="{{ $item->buku->judul ?? 'Buku' }}">
        <p>{{ Str::limit($item->buku->judul ?? 'Buku Tersimpan', 15) }}</p>
    </div>
    @empty
    <p style="grid-column:1/-1; text-align:center; color:#666;">Belum ada buku tersimpan</p>
    @endforelse
</div>
@endsection
