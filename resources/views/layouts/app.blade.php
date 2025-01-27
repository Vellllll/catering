
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering - @yield('title')</title>
    @vite('resources/css/app.css')
    @yield('style')
</head>
<body>
    @section('navigation')
    <div class="container mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        @yield('content')
    </div>

    <footer class="bg-white text-center p-4 mt-8">
        <p>&copy; 2024 Sistem Catering. Semua Hak Dilindungi.</p>
        <p>Dibuat dengan ❤️ oleh Tim Developer</p>
    </footer>
    @yield('script')
</body>
</html>