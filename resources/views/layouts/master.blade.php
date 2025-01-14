<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WeCare - Kesehatan Lingkungan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('head')
</head>
<body class="bg-green-50 font-sans">
    <!-- Navbar -->
    <nav class="bg-green-600 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('dashboard.index') }}" class="text-white text-2xl font-bold">WeCare</a>
            <div>
                @if(Auth::check() && Auth::user()->role == 'admin')
                    <a href="{{ route('admins.index') }}" class="text-white mx-4 hover:underline">Kegiatan</a>
                    <a href="{{ route('admins.create') }}" class="text-white mx-4 hover:underline">Add</a>
                @else
                    <a href="{{ route('tentang') }}" class="text-white mx-4 hover:underline">Tentang</a>
                    <a href="{{ route('lapor.index') }}" class="text-white mx-4 hover:underline">Lapor</a>
                    <a href="{{ route('kegiatan.index') }}" class="text-white mx-4 hover:underline">Kegiatan</a>
                @endif
                @if(Auth::check())
                        <a href="{{ route('logout') }}" class="text-white mx-4 hover:underline">{{ Auth::user()->name }}</a>
                @else
                    <a href="{{ route('login') }}" class="text-white mx-4 hover:underline">Login</a>
                @endif
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto py-8">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-green-600 text-white text-center py-4">
        <p>&copy; 2024 WeCare. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>
