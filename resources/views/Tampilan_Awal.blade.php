<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Perpustakaan Digital</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
font-family:Segoe UI,sans-serif;
background:url('/images/u_x3nnlmkfcx-background-8471342_1920.jpg') no-repeat center/cover;
}

/* ANIMASI */
@keyframes fadeIn{
from{opacity:0; transform:translateY(20px);}
to{opacity:1; transform:translateY(0);}
}

/* TOGGLE */
.toggle-btn{
position:fixed;
top:15px;
left:15px;
font-size:24px;
cursor:pointer;
background:#3f51ff;
color:white;
padding:6px 12px;
border-radius:5px;
z-index:1003;
transition:0.3s;
}

.toggle-btn.move{
left:265px;
}

/* OVERLAY */
.overlay{
position:fixed;
width:100%;
height:100%;
background:rgba(0,0,0,0.5);
opacity:0;
visibility:hidden;
transition:0.3s;
z-index:1001;
}

.overlay.show{
opacity:1;
visibility:visible;
}

/* SIDEBAR */
.sidebar{
position:fixed;
left:-260px;
top:0;
width:260px;
height:100%;
background:rgba(255,255,255,0.9);
backdrop-filter:blur(10px);
transition:0.4s;
z-index:1002;
box-shadow:5px 0 20px rgba(0,0,0,0.2);
}

.sidebar.open{
left:0;
}

/* PROFILE */
.profile{
display:flex;
gap:10px;
padding:20px;
border-bottom:1px solid rgba(0,0,0,0.1);
}

.profile img{
width:50px;
border-radius:50%;
}

/* MENU */
.menu a{
display:block;
padding:15px;
color:#333;
text-decoration:none;
transition:0.2s;
}

.menu a:hover{
background:#e0e0e0;
padding-left:25px;
}

/* CONTENT */
.content{
padding:80px 30px;
transition:0.4s;
animation:fadeIn 0.8s;
}

.content.shift{
margin-left:260px;
}

/* WELCOME */
.welcome{
text-align:center;
margin-bottom:40px;
}

.welcome h1{
font-size:36px;
}

/* SLIDER */
.slider{
max-width:800px;
margin:auto;
overflow:hidden;
border-radius:20px;
box-shadow:0 15px 30px rgba(0,0,0,0.3);
}

.slides{
display:flex;
transition:0.8s ease-in-out;
}

.slides img{
width:100%;
height:250px;
object-fit:cover;
}

/* REKOMENDASI */
.rekomendasi{
margin-top:40px;
}

.rekomendasi h2{
text-align:center;
margin-bottom:20px;
}

/* GRID 5 CARD */
.card-container{
display:grid;
grid-template-columns:repeat(5,1fr);
gap:15px;
}

/* CARD KECIL */
.card{
background:rgba(255,255,255,0.9);
border-radius:12px;
overflow:hidden;
transition:0.3s;
font-size:14px;
animation:fadeIn 1s;
}

.card:hover{
transform:translateY(-8px) scale(1.02);
box-shadow:0 10px 20px rgba(0,0,0,0.3);
}

.card img{
width:100%;
height:130px;
object-fit:cover;
}

.card-body{
padding:10px;
}

.card h4{
font-size:14px;
margin-bottom:5px;
}

.card p{
font-size:12px;
color:#555;
}

.btn{
display:inline-block;
margin-top:8px;
background:linear-gradient(45deg,#4CAF50,#66BB6A);
color:white;
padding:5px 10px;
border-radius:20px;
font-size:12px;
text-decoration:none;
transition:0.3s;
}

.btn:hover{
transform:scale(1.1);
}

/* FOOTER */
.footer{
text-align:center;
padding:20px;
margin-top:40px;
background:rgba(0,0,0,0.1);
}

/* LOGOUT */
.logout-form{
position:fixed;
top:15px;
right:15px;
z-index:1003;
}

.logout-btn{
background:red;
color:white;
padding:8px 15px;
border:none;
border-radius:5px;
cursor:pointer;
}

/* RESPONSIVE */
@media(max-width:1200px){
.card-container{
grid-template-columns:repeat(4,1fr);
}
}

@media(max-width:768px){
.card-container{
grid-template-columns:repeat(2,1fr);
}

.content.shift{
margin-left:0;
}

.toggle-btn.move{
left:15px;
}
}

@media(max-width:480px){
.card-container{
grid-template-columns:1fr;
}
}

</style>
</head>

<body>

<div class="toggle-btn" onclick="toggleSidebar()">☰</div>

<form method="POST" action="/logout" class="logout-form">
@csrf
<button class="logout-btn">Logout</button>
</form>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
<div class="profile">
<img src="{{ $user->foto ? '/images/profiles/' . $user->foto : 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}" style="width:50px; border-radius:50%;">
<div>
<h3>{{ $user->username }}</h3>
<p>{{ $user->deskripsi ?? 'Account' }}</p>
</div>
</div>

<div class="menu">
<a href="{{ route('sidebar.setting-account') }}">Setting Account</a>
<a href="{{ route('sidebar.buku-simpan') }}">Buku Tersimpan</a>
<a href="{{ route('sidebar.scane-barcode') }}">Scan Barcode</a>
<a href="{{ route('sidebar.settings') }}">Settings</a>
</div>
</div>

<div class="overlay" id="overlay"></div>

<!-- CONTENT -->
<div class="content" id="content">

<section class="welcome">
<h1>Welcome</h1>
<h2>Selamat datang, {{ $user->username }}</h2>
</section>

<!-- SLIDER -->
<div class="slider" id="slider">
<div class="slides">
<img src="https://picsum.photos/800/250?1">
<img src="https://picsum.photos/800/250?2">
<img src="https://picsum.photos/800/250?3">
</div>
</div>


<!-- REKOMENDASI -->
<section class="rekomendasi">
<h2 style="text-align: left;">📚 Rekomendasi Buku Cerita</h2>

<div class="card-container">

<!-- 5+ CARD -->
<div class="card"><img src="https://picsum.photos/200/150?1"><div class="card-body"><h4>Algoritma</h4><p>Sukamto</p><a href="#" class="btn">Baca</a></div></div>
<div class="card"><img src="https://picsum.photos/200/150?2"><div class="card-body"><h4>Struktur Data</h4><p>Budi</p><a href="#" class="btn">Baca</a></div></div>
<div class="card"><img src="https://picsum.photos/200/150?3"><div class="card-body"><h4>Database</h4><p>Siti</p><a href="#" class="btn">Baca</a></div></div>
<div class="card"><img src="https://picsum.photos/200/150?4"><div class="card-body"><h4>Python</h4><p>Aji</p><a href="#" class="btn">Baca</a></div></div>
<div class="card"><img src="https://picsum.photos/200/150?5"><div class="card-body"><h4>AI</h4><p>John</p><a href="#" class="btn">Baca</a></div></div>

</div>
</section>

<!-- REKOMENDASI -->
<section class="rekomendasi">
<h2 style="text-align: left;">📚 Rekomendasi Buku Belajar</h2>


<div class="card-container">

<!-- 5+ CARD -->
<div class="card"><img src="https://picsum.photos/200/150?6"><div class="card-body"><h4>Algoritma</h4><p>Sukamto</p><a href="#" class="btn">Baca</a></div></div>
<div class="card"><img src="https://picsum.photos/200/150?7"><div class="card-body"><h4>Struktur Data</h4><p>Budi</p><a href="#" class="btn">Baca</a></div></div>
<div class="card"><img src="https://picsum.photos/200/150?8"><div class="card-body"><h4>Database</h4><p>Siti</p><a href="#" class="btn">Baca</a></div></div>
<div class="card"><img src="https://picsum.photos/200/150?9"><div class="card-body"><h4>Python</h4><p>Aji</p><a href="#" class="btn">Baca</a></div></div>
<div class="card"><img src="https://picsum.photos/200/150?10"><div class="card-body"><h4>AI</h4><p>John</p><a href="#" class="btn">Baca</a></div></div>

</div>
</section>

<footer class="footer">
© 2026 Perpustakaan Digital
</footer>

</div>

<script>

let sidebar=document.getElementById("sidebar");
let overlay=document.getElementById("overlay");
let content=document.getElementById("content");
let toggleBtn=document.querySelector(".toggle-btn");

function toggleSidebar(){
sidebar.classList.toggle("open");
overlay.classList.toggle("show");
content.classList.toggle("shift");
toggleBtn.classList.toggle("move");
}

overlay.onclick=()=>{
sidebar.classList.remove("open");
overlay.classList.remove("show");
content.classList.remove("shift");
toggleBtn.classList.remove("move");
}

/* SLIDER */
let index=0;
let slides=document.querySelector(".slides");
let total=document.querySelectorAll(".slides img").length;

setInterval(()=>{
index=(index+1)%total;
slides.style.transform="translateX(-"+(index*100)+"%)";
},3000);

</script>

</body>
</html>