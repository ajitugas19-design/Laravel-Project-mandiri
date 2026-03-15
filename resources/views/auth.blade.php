<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

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

.login-box h1{
    font-size:50px;
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

/* tombol login */
.btn-login{
    background:#2f2f2f;
    color:white;
}

.btn-login:hover{
    background:#444;
}

/* tombol daftar */
.btn-daftar{
    background:#4CAF50;
    color:white;
}

.btn-daftar:hover{
    background:#45a049;
}

.forgot{
    margin-top:10px;
    font-size:13px;
}

a{
    color:black;
    text-decoration:none;
}

.error{
    color:red;
    margin-top:10px;
}

.success{
    color:green;
    margin-top:10px;
}

/* Responsive */
@media (max-width: 480px){
    .login-box{
        width:90%;
        padding:30px 20px;
    }
}
/* Loading Spinner */
/* Page Transition Slide */
.page {
    position: relative;
    overflow: hidden;
}
.page-enter .container {
    animation: slideInRight 0.3s ease-out forwards;
}
.page-exit .container {
    animation: slideOutLeft 0.3s ease-in forwards;
}
@keyframes slideInRight {
    from { transform: translateX(100%); }
    to { transform: translateX(0); }
}
@keyframes slideOutLeft {
    from { transform: translateX(0); }
    to { transform: translateX(-100%); }
}
</style>

</head>
<body class="page page-enter">
<div class="container">
<div class="login-box">

<h1>Login</h1>

<form action="{{ route('login.post') }}" method="POST">
@csrf

<label>Username</label>
<input type="text" name="username" placeholder="Value" required>

<label>Password</label>
<input type="password" name="password" placeholder="Value" required>

<button type="submit" class="btn btn-login">Sign In</button>

<a href="{{ route('daftar.get') }}" class="btn btn-daftar">Daftar</a>

<div class="forgot">

@if (session('error'))
<div class="error">{{ session('error') }}</div>
@endif

@if (session('success'))
<div class="success">{{ session('success') }}</div>
@endif

<a href="{{ route('forgot.get') }}">Forgot password?</a>

    </div>

</form>

</div> <!-- container -->

<script>
// Page transition
    document.addEventListener('click', function(e) {
        let link = e.target.closest('a');
        if (link && link.href) {
            e.preventDefault();
            document.body.classList.add('page-exit');
            setTimeout(() => {
                window.location.href = link.href;
            }, 150);
        }
    });
</script>
</body>
</html>
