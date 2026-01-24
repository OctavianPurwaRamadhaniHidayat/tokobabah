<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Toko Babah')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/assets/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/user.css') }}">
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
            
            <li class="sidebar-item">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="sidebar-link btn-logout">
                        Logout
                    </button>
                </form>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
        </ul>

    </aside>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
        <header class="topbar">
        <form action="{{ route('sepatu.search') }}" method="GET" class="search-form">
            <input 
                type="text" 
                name="q" 
                placeholder="Cari nama sepatu..."
                value="{{ request('q') }}"
                class="search-input"
            >

            <button type="submit" class="search-btn">Cari</button>
        </form>



            <div class="user">
                Selamat datang 
                <div style="font-weight: bold;">
                    {{ auth()->user()->name ?? 'User' }}
                </div>
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
