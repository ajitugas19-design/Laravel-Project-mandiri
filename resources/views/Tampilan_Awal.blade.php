<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Perpustakaan Digital - Dashboard</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
font-family:Segoe UI,sans-serif;
background-image:url('/images/u_x3nnlmkfcx-background-8471342_1920.jpg');
background-size:cover;
background-position:center;
background-attachment:fixed;
}

/* toggle button */

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
}

/* overlay */

.overlay{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.4);
opacity:0;
visibility:hidden;
transition:0.3s;
z-index:1001;
}

.overlay.show{
opacity:1;
visibility:visible;
}

/* sidebar */
.toggle-btn.hide{
opacity:0;
pointer-events:none;
}

.sidebar{
position:fixed;
left:-250px;
top:0;
width:250px;
height:100%;
background:#d6d1d9;
transition:0.35s ease;
z-index:1002;
}

.sidebar.open{
left:0;
}

/* profile */

.profile{
display:flex;
align-items:center;
gap:10px;
padding:20px;
border-bottom:1px solid rgba(0,0,0,0.1);
}

.profile img{
width:50px;
height:50px;
border-radius:50%;
}

.profile h3{
font-size:18px;
}

.profile p{
font-size:13px;
color:#555;
}

/* menu */

.menu a{
display:block;
padding:15px 20px;
text-decoration:none;
color:#333;
}

.menu a:hover{
background:#cfc9d2;
}

.menu a.active{
background:#c7c1cc;
border-top:2px solid #3f51ff;
border-bottom:2px solid #3f51ff;
}

/* content */

.content{
padding:70px 40px 40px 40px;
margin-left:0;
transition:0.3s;
}

/* welcome */

.welcome{
text-align:center;
margin-bottom:50px;
}

.welcome h1{
font-size:48px;
font-weight:800;
color:#333;
}

.welcome h2{
margin-top:10px;
color:#555;
}

/* slider */

.slider-area{
display:flex;
align-items:center;
justify-content:center;
gap:30px;
margin-bottom:60px;
}

.avatar-list{
display:flex;
flex-direction:column;
gap:12px;
}

.avatar{
width:50px;
height:50px;
border-radius:15px;
object-fit:cover;
border:3px solid rgba(255,255,255,0.3);
}

.slider{
width:700px;
overflow:hidden;
border-radius:25px;
box-shadow:0 15px 35px rgba(0,0,0,0.3);
}

.slides{
display:flex;
width:300%;
transition:0.6s;
}

.slides img{
width:100%;
height:280px;
object-fit:cover;
}

/* rekomendasi */

.rekomendasi h2{
text-align:center;
margin-bottom:30px;
color:#333;
}

.card-container{
display:grid;
grid-template-columns:repeat(auto-fill,minmax(280px,1fr));
gap:25px;
}

.card{
background:white;
border-radius:20px;
overflow:hidden;
box-shadow:0 10px 30px rgba(0,0,0,0.2);
transition:0.3s;
}

.card:hover{
transform:translateY(-10px);
}

.card img{
width:100%;
height:200px;
object-fit:cover;
}

.card-body{
padding:20px;
}

.btn{
background:linear-gradient(45deg,#4CAF50,#66BB6A);
color:white;
padding:10px 20px;
border-radius:25px;
text-decoration:none;
display:inline-block;
margin-top:10px;
}

/* footer */

.footer{
text-align:center;
padding:30px;
background:rgba(0,0,0,0.05);
margin-top:50px;
color:#666;
}

/* logout */

.logout-form{
position:fixed;
top:15px;
right:15px;
z-index:1003;
}

.logout-btn{
background:#ff4444;
color:white;
padding:8px 16px;
border:none;
border-radius:5px;
cursor:pointer;
}

/* responsive */

@media(max-width:768px){

.slider-area{
flex-direction:column;
}

.slider{
width:100%;
}

}

</style>
</head>

<body>

<div class="toggle-btn" onclick="toggleSidebar(event)">☰</div>

<form method="POST" action="/logout" class="logout-form">
@csrf
<button type="submit" class="logout-btn">Logout</button>
</form>

<!-- sidebar -->

<div class="sidebar" id="sidebar">

<div class="profile">
<img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
<div>
<h3>{{ $user->username }}</h3>
<p>{{ $user->keterangan ?? 'Account' }}</p>
</div>
</div>

<div class="menu">
<a href="#">Setting Account</a>
<a href="#">Buku Tersimpan</a>
<a href="#">Scane Barcode</a>
<a href="#" class="active">Settings</a>
</div>

</div>

<!-- overlay -->

<div class="overlay" id="overlay"></div>

<!-- content -->

<div class="content" id="content">

<section class="welcome">
<h1>Welcome</h1>
<h2>Selamat datang, {{ $user->username ?? 'Pengguna' }} di Perpustakaan Digital</h2>
</section>

<div class="slider-area">

<div class="avatar-list">
<img src="https://i.pravatar.cc/50?img=1" class="avatar">
<img src="https://i.pravatar.cc/50?img=2" class="avatar">
<img src="https://i.pravatar.cc/50?img=3" class="avatar">
</div>

<div class="slider">
<div class="slides">
<img src="https://picsum.photos/900/280?1">
<img src="https://picsum.photos/900/280?2">
<img src="https://picsum.photos/900/280?3">
</div>
</div>

<div class="avatar-list">
<img src="https://i.pravatar.cc/50?img=4" class="avatar">
<img src="https://i.pravatar.cc/50?img=5" class="avatar">
<img src="https://i.pravatar.cc/50?img=6" class="avatar">
</div>

</div>

<section class="rekomendasi">

<h2>📚 Rekomendasi Buku Terbaru</h2>

<div class="card-container">

<div class="card">
<img src="https://picsum.photos/280/200?1">
<div class="card-body">
<h4>Algoritma dan Pemrograman</h4>
<p>Ir. Sukamto, M.T</p>
<a href="#" class="btn">Baca Sekarang</a>
</div>
</div>

<div class="card">
<img src="https://picsum.photos/280/200?2">
<div class="card-body">
<h4>Struktur Data</h4>
<p>Dr. Budi Santoso</p>
<a href="#" class="btn">Baca Sekarang</a>
</div>
</div>

<div class="card">
<img src="https://picsum.photos/280/200?3">
<div class="card-body">
<h4>Database Design</h4>
<p>Prof. Siti Aminah</p>
<a href="#" class="btn">Baca Sekarang</a>
</div>
</div>

<div class="card">
<img src="https://picsum.photos/280/200?4">
<div class="card-body">
<h4>Belajar Python</h4>
<p>Prof. Ahmat Panjau Aji</p>
<a href="#" class="btn">Baca Sekarang</a>
</div>
</div>

</div>

</section>

<footer class="footer">
© 2026 Perpustakaan Digital
</footer>

</div>

<script>

/* sidebar */
let sidebar = document.getElementById("sidebar");
let overlay = document.getElementById("overlay");
let toggleBtn = document.querySelector(".toggle-btn");

function toggleSidebar(event){

event.stopPropagation();

sidebar.classList.toggle("open");
overlay.classList.toggle("show");
toggleBtn.classList.toggle("hide");

}

overlay.addEventListener("click",function(){

sidebar.classList.remove("open");
overlay.classList.remove("show");
toggleBtn.classList.remove("hide");

});

/* slider */

let index=0;

function slideBanner(){

const slides=document.querySelector(".slides");
const total=document.querySelectorAll(".slides img").length;

index++;

if(index>=total){
index=0;
}

slides.style.transform="translateX(-"+(index*100)+"%)";

}

setInterval(slideBanner,4000);

</script>

</body>
</html>