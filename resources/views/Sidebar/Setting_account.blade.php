@extends('layouts.sidebar')

@section('title', 'Setting Account')

@section('styles')
<style>
.container{
    text-align:center;
    max-width:500px;
    margin:0 auto;
}

img{
    width:150px;
    height:150px;
    border-radius:50%;
    margin:0 auto 30px;
    display:block;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

h1{
    font-size:40px;
    margin-bottom:10px;
    color:#333;
}

p{
    color:#666;
    margin:10px 0;
    font-size:16px;
}

.desc{
    font-size:14px;
    line-height:1.6;
    margin:20px 0;
    color:#555;
}

button{
    background:#4CAF50;
    color:white;
    padding:15px 30px;
    border:none;
    border-radius:25px;
    font-size:16px;
    cursor:pointer;
    box-shadow:0 5px 15px rgba(76,175,80,0.4);
    transition:0.3s;
}

button:hover{
    background:#45a049;
    transform:translateY(-2px);
}
</style>
@endsection

@section('content')
<div class="container">
    <img src="https://cdn-icons-png.flaticon.com/512/4140/4140048.png">

    <h1>Selamat Datang</h1>
    <p>{{ $user->username }}</p>

    <p><b>Deskripsi</b></p>
    <p class="desc">
        {{ $user->keterangan ?? 'Tidak ada deskripsi' }}
    </p>

    <button onclick="alert('Edit profile coming soon!')">EDIT Profile</button>
</div>
@endsection
