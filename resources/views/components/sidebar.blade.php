{{-- Sidebar Component --}}
<aside id="sidebar"
       class="fixed inset-y-0 left-0 z-50 w-[230px] max-w-[85vw] -translate-x-full overflow-y-auto bg-[#141218] transition-transform duration-200 motion-reduce:transition-none group-[.sidebar-open]/body:translate-x-0 lg:translate-x-0 lg:group-[.sidebar-hidden]/body:-translate-x-full">

    <div class="px-[43px] pt-8">
        <a href="/" class="block text-[32px] font-bold leading-10 tracking-tight text-white" draggable="false">
            <img id="logo_palpod" src="{{ asset("images/logo/logo_palpod.png") }}" alt="Logo Palpod">
        </a>
    </div>

    {{-- Navigation  --}}
    <nav class="mt-6 flex flex-col px-5 pb-6">
        @php
            $navBase = 'flex h-14 w-fit items-center gap-2 rounded-full px-4 text-sm font-medium tracking-[0.1px] transition-colors';
            $navActive = 'bg-[#3d3a4a] text-[#e6e0e9]';
            $navIdle = 'text-[#cac4d0] hover:bg-white/[0.08] hover:text-[#e6e0e9]';
        @endphp

        {{-- Home --}}
        <a href="/" class="{{ $navBase }} {{ request()->is('/') ? $navActive : $navIdle }}">
            <svg class="h-6 w-6 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path d="M21 10c-1.1 0-2 .9-2 2v3H5v-3c0-1.1-.9-2-2-2s-2 .9-2 2v5c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2v-5c0-1.1-.9-2-2-2zm-3-5H6c-1.1 0-2 .9-2 2v2.15c1.16.41 2 1.51 2 2.82V14h12v-2.03c0-1.3.84-2.4 2-2.82V7c0-1.1-.9-2-2-2z"/>
            </svg>
            Home
        </a>

        {{-- New Release --}}
        <a href="/new-release" class="{{ $navBase }} {{ request()->is('new-release*') ? $navActive : $navIdle }}">
            <svg class="h-6 w-6 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path d="M9.19 6.35c-2.04 2.29-3.44 5.58-3.57 5.89L2 10.69l4.05-4.05c.47-.47 1.15-.68 1.81-.55l1.33.26zM11.17 17s3.74-1.55 5.89-3.7c5.4-5.4 4.5-9.62 4.21-10.57-.95-.3-5.17-1.19-10.57 4.21C8.55 9.09 7 12.83 7 12.83L11.17 17zm6.48-2.19c-2.29 2.04-5.58 3.44-5.89 3.57L13.31 22l4.05-4.05c.47-.47.68-1.15.55-1.81l-.26-1.33zM9 18c0 .83-.34 1.58-.88 2.12C6.94 21.3 2 22 2 22s.7-4.94 1.88-6.12C4.42 15.34 5.17 15 6 15c1.66 0 3 1.34 3 3zm4-9c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2z"/>
            </svg>
            New Realese
        </a>

        {{-- Audio Podcast --}}
        <a href="/audio-podcast" class="{{ $navBase }} {{ request()->is('audio*') ? $navActive : $navIdle }}">
            <svg class="h-6 w-6 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 14c1.66 0 2.99-1.34 2.99-3L15 5c0-1.66-1.34-3-3-3S9 3.34 9 5v6c0 1.66 1.34 3 3 3zm5.3-3c0 3-2.54 5.1-5.3 5.1S6.7 14 6.7 11H5c0 3.41 2.72 6.23 6 6.72V21h2v-3.28c3.28-.48 6-3.3 6-6.72h-1.7z"/>
            </svg>
            Audio Podcast
        </a>
    </nav>

    <script>
        document.getElementById('logo_palpod').ondragstart = function() { return false; };
    </script>
</aside>