<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Palpod')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo_palpod2.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="group/body min-h-screen overflow-hidden bg-[#141218] font-['Roboto',sans-serif] text-[#e6e0e9] antialiased">

    {{-- Sidebar --}}
    @include('components.sidebar')

    {{-- Overlay gelap (hanya tampil di mobile/tablet saat sidebar terbuka) --}}
    <div data-sidebar-overlay
         class="pointer-events-none fixed inset-0 z-40 bg-black/60 opacity-0 transition-opacity duration-200 motion-reduce:transition-none group-[.sidebar-open]/body:pointer-events-auto group-[.sidebar-open]/body:opacity-100 lg:hidden"></div>

    {{-- Area utama: tidak ikut scroll halaman, yang scroll hanya panel di dalamnya --}}
    <div class="fixed inset-y-0 left-0 right-0 p-2.5 pb-0 transition-[left] duration-200 motion-reduce:transition-none lg:left-[230px] lg:group-[.sidebar-hidden]/body:left-0">
        <div class="h-full overflow-y-auto overflow-x-hidden @yield('container_class', 'rounded-t-[28px] rounded-b-none bg-[#0f0d13]') [scrollbar-color:#36343b_transparent] [scrollbar-width:thin]">

            {{-- Topbar (dipisah per halaman) --}}
            @yield('topbar')

            {{-- Konten halaman --}}
            <main class="@yield('main_class', 'px-4 pb-6 sm:px-6 rounded-b-[28px]')">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        (function () {
            var body = document.body;
            var desktop = window.matchMedia('(min-width: 1024px)');

            function toggleSidebar() {
                body.classList.toggle(desktop.matches ? 'sidebar-hidden' : 'sidebar-open');
            }

            document.addEventListener('click', function (e) {
                if (e.target.closest('[data-sidebar-toggle]')) {
                    toggleSidebar();
                } else if (e.target.closest('[data-sidebar-overlay]')) {
                    body.classList.remove('sidebar-open');
                }
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') body.classList.remove('sidebar-open');
            });

            desktop.addEventListener('change', function () {
                body.classList.remove('sidebar-open');
            });
        })();
    </script>
</body>
</html>