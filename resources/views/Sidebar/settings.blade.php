@extends('layouts.sidebar')

@section('title', 'Settings')

@section('styles')
<style>
.container { 
    max-width:500px; 
    margin:0 auto; 
    background:white; 
    padding:40px; 
    border-radius:20px; 
    box-shadow:0 15px 40px rgba(0,0,0,0.1); 
}
h2 { 
    text-align:center; 
    margin-bottom:40px; 
    color:#333; 
    font-size:28px; 
}
.form-group { 
    margin-bottom:25px; 
}
label { 
    display:block; 
    margin-bottom:10px; 
    font-weight:600; 
    color:#444; 
}
input[type="checkbox"] { 
    width:auto; 
    transform:scale(1.2); 
    margin-right:10px; 
}
select, input[type="text"], input[type="email"], input[type="password"] { 
    width:100%; 
    padding:15px; 
    border:2px solid #eee; 
    border-radius:12px; 
    font-size:16px; 
    transition:0.3s; 
}
select:focus, input:focus { 
    outline:none; 
    border-color:#4CAF50; 
    box-shadow:0 0 0 3px rgba(76,175,80,0.1); 
}
button { 
    width:100%; 
    padding:18px; 
    background:linear-gradient(135deg,#4CAF50,#45a049); 
    color:white; 
    border:none; 
    border-radius:12px; 
    font-size:18px; 
    font-weight:600; 
    cursor:pointer; 
    transition:0.3s; 
}
button:hover { 
    transform:translateY(-2px); 
    box-shadow:0 10px 25px rgba(76,175,80,0.4); 
}
.success { 
    background:#d4edda; 
    color:#155724; 
    padding:15px; 
    border-radius:10px; 
    margin-bottom:25px; 
    border-left:5px solid #28a745; 
}
</style>
@endsection

@section('content')
<div class="container">
<h2>⚙️ Pengaturan Akun</h2>

@if(session('success'))
<div class="success">{{ session('success') }}</div>
@endif

    <form action="#" method="POST" onclick="alert('Settings saved!') ; return false;">
@csrf
<div class="form-group">
    <label><input type="checkbox" name="email_notif" checked> Terima Notifikasi Email</label>
</div>
<div class="form-group">
    <label>Tema Tampilan</label>
    <select name="theme">
        <option value="light">Light (Default)</option>
        <option value="dark">Dark Mode</option>
    </select>
</div>
<div class="form-group">
    <label>Bahasa</label>
    <select name="language">
        <option value="id">Bahasa Indonesia</option>
        <option value="en">English</option>
    </select>
</div>

<button type="submit">💾 Simpan Pengaturan</button>
</form>
</div>
@endsection

