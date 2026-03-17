<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Sidebar - Perpustakaan Digital')</title>
@yield('styles')
</head>
<body style="margin:0; padding:0; font-family:Arial, sans-serif; background:#f5f5f5; min-height:100vh;">

<!-- Back to Home -->
<a href="{{ route('tampilan-awal') }}" style="position:fixed; top:20px; left:20px; z-index:1000; font-size:24px; color:#333; text-decoration:none; background:#fff; padding:10px 15px; border-radius:50%; box-shadow:0 4px 12px rgba(0,0,0,0.15); display:block; width:50px; height:50px; text-align:center; line-height:30px;">←</a>

<div style="padding:80px 20px 20px;">
    @yield('content')
</div>

@yield('scripts')

</body>
</html>

