@extends('layouts.sidebar')

@section('title', 'Scan Barcode')

@section('styles')
<style>
.container{
    text-align:center;
    padding-top:50px;
}

h2{
    font-size:32px;
    margin-bottom:15px;
    color:#333;
}

p{
    font-size:18px;
    color:#666;
    margin-bottom:40px;
    max-width:500px;
    margin-left:auto;
    margin-right:auto;
    line-height:1.6;
}

.scan-btn{
    padding:20px 50px;
    font-size:20px;
    border-radius:50px;
    box-shadow:0 10px 30px rgba(76,175,80,0.4);
    transition:0.3s;
}

.scan-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 15px 40px rgba(76,175,80,0.6);
}

.scan-area{
    width:300px;
    height:300px;
    border:3px dashed #4CAF50;
    border-radius:20px;
    margin:40px auto;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
    color:#4CAF50;
    background:rgba(76,175,80,0.1);
}
</style>
@endsection

@section('content')
<div class="container">
    <h2>📱 Scan Barcode</h2>
    <p>Scan kode barcode buku untuk mencari detail atau menambahkan ke koleksi tersimpan</p>
    
    <div class="scan-area">
        📷 Place barcode here
    </div>
    
    <button class="scan-btn" onclick="scan()">Mulai Scan</button>
</div>

<script>
function scan(){
    alert("Fitur scan barcode siap integrasi dengan kamera! 😄");
}
</script>
@endsection
