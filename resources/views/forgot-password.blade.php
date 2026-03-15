<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lupa Password</title>

<style>
html {
    background-image: url('/images/walpaper login.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-color: #efefef;
    background-attachment: fixed;
    min-height: 100vh;
}
body{
    margin:0;
    padding:0;
    font-family:Arial, Helvetica, sans-serif;
    background: transparent;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height: 100vh;
}

.login-box{
    width:350px;
    background:#d9d9de;
    padding:40px;
    border-radius:8px;
    text-align:center;
    box-shadow:0 0 10px rgba(0,0,0,0.2);
}

.login-box h2{
    font-size:40px;
    margin-bottom:20px;
}

label{
    display:block;
    text-align:center;
    font-size:14px;
    margin-top:10px;
}

input{
    width:100%;
    padding:10px;
    margin-top:5px;
    border-radius:5px;
    border:1px solid #ccc;
    box-sizing:border-box;
}

/* tombol umum */
.btn{
    width:100%;
    padding:10px;
    margin-top:15px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    display:block;
    text-align:center;
    text-decoration:none;
    box-sizing:border-box;
    font-size:14px;
}

/* tombol reset */
.btn-reset{
    background:#2f2f2f;
    color:white;
}

.btn-reset:hover{
    background:#444;
}

/* tombol kembali */
.btn-login{
    background:#4CAF50;
    color:white;
}

.btn-login:hover{
    background:#45a049;
}

.error{
    color:red;
    margin-top:10px;
}

.success{
    color:green;
    margin-top:10px;
}

/* responsive */
@media (max-width:480px){
.login-box{
width:90%;
padding:30px 20px;
}
}

/* ===== PAGE TRANSITION ===== */

.page{
position:relative;
overflow:hidden;
}

.page-enter{
animation:slideInRight 0.5s ease-out forwards;
}

.page-exit{
animation:slideOutLeft 0.5s ease-in forwards;
}

@keyframes slideInRight{
from{transform:translateX(100%);}
to{transform:translateX(0);}
}

@keyframes slideOutLeft{
from{transform:translateX(0);}
to{transform:translateX(-100%);}
}

</style>
</head>

<body class="page page-enter">

<div class="login-box">

<h2>Lupa Password</h2>

<form action="{{ route('forgot.post') }}" method="POST">
@csrf

<label>Nomor Telepon</label>
<input type="tel" name="no_telp" placeholder="08123456789" required>

<label>Email</label>
<input type="email" name="email" placeholder="admin@example.com" required>

<label>Kata Sandi Baru</label>
<input type="password" name="new_password" placeholder="Password baru" required>

<button type="submit" class="btn btn-reset">Reset Password</button>

<a href="{{ route('login.get') }}" class="btn btn-login">Kembali ke Login</a>

<div>

@if (session('error'))
<div class="error">{{ session('error') }}</div>
@endif

@if (session('success'))
<div class="success">{{ session('success') }}</div>
@endif

</div>

</form>

</div>

<script>

/* animasi pindah halaman */
document.addEventListener("click",function(e){

let link = e.target.closest("a");

if(link && link.getAttribute("href")){

e.preventDefault();

document.body.classList.add("page-exit");

setTimeout(function(){
window.location.href = link.href;
},500);

}

});

</script>

</body>
</html>
