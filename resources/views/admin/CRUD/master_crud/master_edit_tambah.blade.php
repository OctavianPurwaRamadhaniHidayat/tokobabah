<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Hak Admin')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/assets/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/user.css') }}">
    {{-- Vite CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h2 class="logo">TOKO BABAH</h2>
        <ul>
            <li><a href="/dashboard_user">Dashboard</a></li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li><a href="/sepatu">Sepatu</a></li>p

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <li><a href="/keranjang">Keranjang</a></li>
        </ul>
    </aside>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
        <header class="topbar">
        <form class="search-box">
            <input type="text" placeholder="Cari apa maumu...">
            <button type="submit">Cari</button>
        </form>

            <div class="user">
                {{ auth()->user()->name ?? 'User' }}
            </div>
        </header>

        <!-- CONTENT -->
        <main class="content">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
