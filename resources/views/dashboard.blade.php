<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
html {
    background-image: url('/images/walpaper login.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-color: #f0f0f0;
    background-attachment: fixed;
    min-height: 100vh;
}
body { font-family: Arial, sans-serif; background: transparent; }
        @media (prefers-color-scheme: dark) {
            body { background: #1a1a1a; color: #e0e0e0; }
        }

/* Page Transition Slide */
.page {
    position: relative;
    overflow: hidden;
}
.page-enter {
    animation: slideInRight 0.5s ease-out forwards;
}
.page-exit {
    animation: slideOutLeft 0.5s ease-in forwards;
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
<body class="page page-enter min-h-screen flex items-center justify-center p-6">
    <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg max-w-md w-full text-center" style="background: #f5f5f5;">
        <h1 class="text-2xl font-bold mb-4" style="color: #333;">Selamat Datang, {{ $user['username'] ?? 'User' }}!</h1>
        @if(isset($user['keterangan']))
            <p class="mb-6"><strong>Keterangan:</strong> {{ $user['keterangan'] }}</p>
        @endif
        <div class="space-y-3">
            <a href="{{ route('logout') }}" 
               class="block w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded font-medium">
                Logout
            </a>
            <a href="/" class="block w-full bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded font-medium">
                Kembali ke Login
            </a>
        </div>
        @if (session('success'))
            <p class="mt-4 p-3 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded">{{ session('success') }}</p>
        @endif
    </div>
<script>
// Page transition
    document.addEventListener('click', function(e) {
        if (e.target.tagName === 'A' || e.target.closest('a')) {
            document.body.classList.add('page-exit');
            setTimeout(() => {
                window.location = e.target.href || e.target.closest('a').href;
            }, 500);
        }
    });
</script>
</xai:function_call name="edit_file">

<xai:function_call name="edit_file">
<parameter name="path">resources/views/dashboard.blade.php
</body>
</html>

