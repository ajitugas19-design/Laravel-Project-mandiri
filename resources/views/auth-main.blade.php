```html
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Auth</title>

<script type="module" src="https://cdn.spline.design/@splinetool/hana-viewer@1.2.51/hana-viewer.js"></script>

<style>

body{
margin:0;
font-family:Arial, Helvetica, sans-serif;
height:100vh;
overflow:hidden;
display:flex;
justify-content:center;
align-items:center;
}

/* SPLINE BACKGROUND */

hana-viewer{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
z-index:1;
}

/* LOGIN BOX */

.login-box{
width:350px;
background:rgba(255,255,255,0.85);
backdrop-filter:blur(10px);
padding:40px;
border-radius:10px;
text-align:center;
box-shadow:0 0 15px rgba(0,0,0,0.3);
position:absolute;
z-index:10;
}

.login-box h1,
.login-box h2{
font-size:40px;
margin-bottom:20px;
}

/* FORM */

label{
display:block;
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

/* BUTTON */

.btn{
width:100%;
padding:10px;
margin-top:15px;
border:none;
border-radius:5px;
cursor:pointer;
display:block;
text-decoration:none;
font-size:14px;
}

.btn-login{
background:#2f2f2f;
color:white;
}

.btn-login:hover{
background:#444;
}

.btn-daftar{
background:#4CAF50;
color:white;
}

.btn-daftar:hover{
background:#45a049;
}

/* MESSAGE */

.error{
color:red;
margin-top:10px;
}

.success{
color:green;
margin-top:10px;
}

/* RESPONSIVE */

@media(max-width:480px){
.login-box{
width:90%;
padding:30px 20px;
}
}

/* SLIDE ANIMATIONS */
.slide-out-left {
  animation: slideOutLeft 0.3s ease-in forwards;
}
.slide-in-right {
  animation: slideInRight 0.3s ease-out forwards;
}
@keyframes slideOutLeft {
  from { transform: translateX(0); opacity: 1; }
  to { transform: translateX(-100%); opacity: 0; }
}
@keyframes slideInRight {
  from { transform: translateX(100%); opacity: 0; }
  to { transform: translateX(0); opacity: 1; }
}

</style>
</head>

<body>

<!-- SPLINE 3D BACKGROUND -->
<hana-viewer url="https://prod.spline.design/phsmAvN1FgGJpmYr-Wua/scene.hanacode"></hana-viewer>

<!-- LOGIN -->
<div id="login-pack" class="login-box">

<h1>Login</h1>

<form action="{{ route('login.post') }}" method="POST">
@csrf

<label>Username</label>
<input type="text" name="username" required>

<label>Password</label>
<input type="password" name="password" required>

<button type="submit" class="btn btn-login">Sign In</button>

<button type="button" onclick="showForm('daftar')" class="btn btn-daftar">
Daftar
</button>

<div style="margin-top:10px">

<button type="button" onclick="showForm('forgot')" style="background:none;border:none;cursor:pointer;">
Forgot password?
</button>

</div>

@if (session('error'))
<div class="error">{{ session('error') }}</div>
@endif

@if (session('success'))
<div class="success">{{ session('success') }}</div>
@endif

</form>
</div>

<!-- DAFTAR -->
<div id="daftar-pack" class="login-box" style="display:none">

<h1>Daftar</h1>

<form action="{{ route('daftar.post') }}" method="POST">
@csrf

<label>Username</label>
<input type="text" name="username" required>

<label>Password</label>
<input type="password" name="password" required>

<label>Keterangan</label>
<input type="text" name="keterangan" required>

<button type="submit" class="btn btn-login">Simpan</button>

<button type="button" onclick="showForm('login')" class="btn btn-daftar">
Kembali ke Login
</button>

</form>
</div>

<!-- FORGOT -->
<div id="forgot-pack" class="login-box" style="display:none">

<h2>Lupa Password</h2>

<form action="{{ route('forgot.post') }}" method="POST">
@csrf

<label>Nomor Telepon</label>
<input type="tel" name="no_telp" required>

<label>Email</label>
<input type="email" name="email" required>

<label>Kata Sandi Baru</label>
<input type="password" name="new_password" required>

<button type="submit" class="btn btn-login">Reset Password</button>

<button type="button" onclick="showForm('login')" class="btn btn-daftar">
Kembali ke Login
</button>

</form>
</div>

<script>

function showForm(type){
  // Hide all packs first
  document.getElementById('login-pack').style.display='none';
  document.getElementById('daftar-pack').style.display='none';
  document.getElementById('forgot-pack').style.display='none';
  
  let target, current;
  
  if(type==='login') {
    target = 'login-pack';
    current = document.querySelector('.login-box:not([style*=\"display: none\"])');
  } else if(type==='daftar') {
    target = 'daftar-pack';
  } else if(type==='forgot') {
    target = 'forgot-pack';
  }
  
  // Add slide out to current pack
  if(current) {
    current.classList.add('slide-out-left');
  }
  
  setTimeout(() => {
    // Show target with slide in
    document.getElementById(target).style.display = 'block';
    document.getElementById(target).classList.add('slide-in-right');
    
    setTimeout(() => {
      document.getElementById(target).classList.remove('slide-in-right');
      if(current) {
        current.classList.remove('slide-out-left');
      }
    }, 300);
  }, 300);
}

</script>

</body>
</html>
```
