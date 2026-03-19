@extends('layouts.sidebar')

@section('title', 'Edit Profile')

@section('styles')
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

/* BACKGROUND */
.page{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#cfd9df,#e2ebf0,#89f7fe,#66a6ff);
}

/* WRAPPER */
.wrapper{
    width:100%;
    max-width:900px;
    display:flex;
    gap:40px;
}

/* LEFT */
.left{
    flex:1;
    text-align:center;
}

.left img{
    width:220px;
    height:220px;
    border-radius:50%;
    object-fit:cover;
    border:4px solid #fff;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    cursor:pointer;
}

/* BUTTON */
.upload-btn{
    margin-top:15px;
    padding:10px 20px;
    background:#333;
    color:#fff;
    border:none;
    border-radius:6px;
    cursor:pointer;
}

/* RIGHT */
.right{
    flex:1;
    background:#eee;
    padding:30px;
    border-radius:10px;
}

/* FORM */
.form-group{
    margin-bottom:15px;
}

.form-group label{
    font-size:13px;
}

.form-group input,
.form-group textarea{
    width:100%;
    padding:10px;
    border:none;
    border-radius:6px;
    background:#f5f5f5;
}

textarea{
    height:80px;
}

/* SUBMIT */
.submit-btn{
    width:100%;
    padding:12px;
    background:#333;
    color:white;
    border:none;
    border-radius:6px;
    cursor:pointer;
}
</style>
@endsection

@section('content')
<div class="page">

    <div class="wrapper">

        <!-- LEFT -->
        <div class="left">

            <!-- AVATAR -->
            <img id="profile-img"
            src="{{ $user->foto ? asset('images/profiles/'.$user->foto) : 'https://cdn-icons-png.flaticon.com/512/4140/4140048.png' }}">

            <!-- INPUT FILE -->
            <input type="file" id="foto" name="foto" accept="image/*" hidden>

            <!-- BUTTON -->
            <button class="upload-btn" onclick="document.getElementById('foto').click()">
                Upload Foto
            </button>

        </div>

        <!-- RIGHT -->
        <div class="right">

            @if(session('success'))
                <div style="background:green;color:white;padding:10px;border-radius:5px;margin-bottom:10px;">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf

                <!-- PENTING: input file HARUS di dalam form -->
                <input type="file" id="foto-hidden" name="foto" hidden>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" value="{{ $user->username }}" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi">{{ $user->deskripsi }}</textarea>
                </div>

                <button type="submit" class="submit-btn">
                    Update Profile
                </button>
            </form>

        </div>

    </div>

</div>

<script>
// PREVIEW FOTO
document.getElementById('foto').addEventListener('change', function(e){
    const file = e.target.files[0];

    if(file){
        // preview
        const reader = new FileReader();
        reader.onload = function(e){
            document.getElementById('profile-img').src = e.target.result;
        }
        reader.readAsDataURL(file);

        // kirim ke form
        const dt = new DataTransfer();
        dt.items.add(file);
        document.getElementById('foto-hidden').files = dt.files;
    }
});
</script>
@endsection