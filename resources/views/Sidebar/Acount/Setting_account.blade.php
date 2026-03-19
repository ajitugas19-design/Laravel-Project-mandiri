@extends('layouts.sidebar')

@section('title', 'Setting Account')

@section('styles')
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

/* FULL BACKGROUND */
.page-profile{
    min-height:80vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#cfd9df,#e2ebf0,#89f7fe,#66a6ff);
}

/* CONTAINER */
.container{
    text-align:center;
    width:100%;
}

/* AVATAR */
.container img{
    width:200px;
    height:200px;
    border-radius:50%;
    margin-bottom:40px;
}

/* TITLE */
.container h1{
    font-size:42px;
    font-weight:bold;
    color:#222;
}

/* USERNAME */
.username{
    color:#777;
    margin-bottom:20px;
}

/* DESCRIPTION TITLE */
.title-desc{
    font-weight:bold;
    margin-top:10px;
}

/* DESCRIPTION TEXT */
.desc{
    font-size:13px;
    color:#666;
    max-width:400px;
    margin:10px auto 20px;
    line-height:1.5;
}

/* BUTTON */
.container button{
    background:#333;
    color:white;
    padding:10px 25px;
    border:none;
    border-radius:6px;
    font-size:12px;
    cursor:pointer;
    transition:0.3s;
}

.container button:hover{
    background:#000;
}
</style>
@endsection

@section('content')
<div class="page-profile">

    <div class="container">
        <!-- AVATAR -->
        <img src="{{ $user->foto ? '/images/profiles/' . $user->foto : 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}" style="width:200px; border-radius:50%;">

        <!-- TITLE -->
        <h1>Wellcome</h1>

        <!-- USERNAME -->
        <p class="username">{{ $user->username }}</p>

        <!-- DESCRIPTION -->
        <p class="title-desc">Description</p>
        <p class="desc">
{{ $user->deskripsi ?? 'Body text for whatever you’d like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.' }}
        </p>

        <!-- BUTTON -->
        <button onclick="window.location.href='{{ route('setting.profile') }}'">
            EDIT Your Profile
        </button>
    </div>

</div>
@endsection