@extends('layouts.app')

@section('title', 'Palpod - ' . $podcast['title'])

{{-- Custom Topbar sesuai desain detail page --}}
@section('topbar')
    <header class="sticky top-0 z-30 bg-[#141218] px-4 py-4 sm:px-6 sm:py-5 flex items-center justify-between">
        {{-- Sisi Kiri: Tombol Back & Hamburger --}}
        <div class="flex items-center gap-3">
            <a href="/" class="flex h-9 w-9 items-center justify-center rounded-full bg-[#211f26] text-[#cac4d0] hover:text-white transition-colors" title="Kembali">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <button type="button" data-sidebar-toggle aria-label="Toggle menu" aria-controls="sidebar"
                    class="shrink-0 text-[#cac4d0] transition-colors hover:text-white lg:hidden">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
                </svg>
            </button>
        </div>

        {{-- Sisi Kanan: 3 icon bulat/kotak sesuai screenshot --}}
        <div class="flex items-center gap-2.5">
            {{-- Tombol Bintang 1 --}}
            <button type="button" class="flex h-7 w-7 items-center justify-center rounded-full bg-[#d0bcff] text-[#381e72] hover:bg-[#dccdff] transition-colors" title="Bookmark">
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                </svg>
            </button>

            {{-- Tombol Bintang 2 --}}
            <button type="button" class="flex h-7 w-7 items-center justify-center rounded-full bg-[#d0bcff] text-[#381e72] hover:bg-[#dccdff] transition-colors" title="Favorite">
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                </svg>
            </button>

            {{-- Tombol Split / Toggle Sidebar --}}
            <button type="button" data-sidebar-toggle class="flex h-7 w-7 items-center justify-center rounded-lg bg-[#211f26] text-[#cac4d0] hover:text-white transition-colors" title="Toggle Sidebar">
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 4H5c-1.11 0-2 .9-2 2v12c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-9 14H5V6h5v12zm9 0h-7V6h7v12z"/>
                </svg>
            </button>
        </div>
    </header>
@endsection

@section('content')
    <div class="max-w-[960px] mx-auto pb-12">
        {{-- ============ Video Player Card ============ --}}
        <div class="relative overflow-hidden rounded-[28px] bg-[#1e1b24] shadow-2xl">
            {{-- Area Visual Video / Thumbnail --}}
            <div class="relative aspect-[16/9] w-full overflow-hidden bg-black flex items-center justify-center">
                {{-- Background Thumbnail YouTube --}}
                <img src="https://i.ytimg.com/vi/{{ $podcast['youtube_id'] }}/maxresdefault.jpg"
                     onerror="this.onerror=null;this.src='https://i.ytimg.com/vi/{{ $podcast['youtube_id'] }}/hqdefault.jpg'"
                     alt="{{ $podcast['title'] }}"
                     class="h-full w-full object-cover opacity-90">

                {{-- Overlay gelap halus --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/40"></div>

                {{-- Header Video (Logos di tengah atas) --}}
                <div class="absolute top-4 left-1/2 -translate-x-1/2 flex items-center gap-3">
                    <div class="flex items-center gap-1 text-[11px] font-medium tracking-wider text-white">
                        <span class="inline-block h-3.5 w-3.5 rounded-full border border-white/80"></span>
                        <span class="text-[9px] uppercase leading-tight font-semibold">Universitas<br>Gadjah Mada</span>
                    </div>
                    <span class="rounded bg-[#009688] px-1 py-0.5 text-[9px] font-bold text-white uppercase tracking-wider">trpl</span>
                    <span class="text-xs font-bold text-white tracking-tight">pal<span class="text-[#e4f400]">p</span>od</span>
                </div>

                {{-- Badge EPS #1 (Kanan Atas) --}}
                <div class="absolute top-0 right-8 bg-[#5b3ae6] text-white px-3.5 py-3 text-center rounded-b-xl shadow-lg">
                    <span class="block text-[11px] font-bold tracking-wider leading-none">EPS</span>
                    <span class="block text-2xl font-black leading-none mt-1">#{{ $podcast['eps'] }}</span>
                </div>

                {{-- Judul Besar di Tengah Gambar --}}
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center pointer-events-none px-4">
                    <h1 class="text-4xl sm:text-6xl lg:text-7xl font-serif tracking-wider text-[#f5ebd7] uppercase drop-shadow-md">
                        PALPOD IS
                    </h1>
                    <h1 class="text-4xl sm:text-6xl lg:text-7xl font-serif tracking-wider text-[#f5ebd7] uppercase -mt-2 sm:-mt-4 drop-shadow-md">
                        BACK !
                    </h1>

                    {{-- Tag Ribbon Ungu --}}
                    <div class="mt-2 sm:mt-3 bg-[#5b3ae6] text-white px-4 py-1 rounded text-xs sm:text-sm font-semibold tracking-wide shadow-md">
                        {{ $podcast['subtitle'] }}
                    </div>
                </div>

                {{-- Tombol Play Besar di Tengah --}}
                <a href="https://www.youtube.com/watch?v={{ $podcast['youtube_id'] }}" target="_blank" rel="noopener noreferrer"
                   class="absolute z-10 flex h-20 w-20 sm:h-24 sm:w-24 items-center justify-center rounded-full bg-[#d0bcff]/85 text-[#381e72] shadow-2xl transition-transform hover:scale-110 active:scale-95"
                   title="Tonton di YouTube">
                    <svg class="h-10 w-10 sm:h-12 sm:w-12 ml-1" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                </a>
            </div>

            {{-- Player Bar Kontrol di Bagian Bawah --}}
            <div class="bg-[#211f26] px-5 py-3.5 flex items-center gap-4 text-xs text-[#cac4d0]">
                {{-- Timestamp --}}
                <span class="font-mono tracking-wider shrink-0 text-[#cac4d0]">{{ $podcast['current_time'] }}–{{ $podcast['total_time'] }}</span>

                {{-- Progress Bar --}}
                <div class="relative flex-1 h-1 bg-[#49454f] rounded-full overflow-hidden cursor-pointer">
                    <div class="h-full w-[48%] bg-[#d0bcff] rounded-full"></div>
                </div>

                {{-- Kontrol Pause & Next --}}
                <div class="flex items-center gap-3 shrink-0 text-[#e6e0e9]">
                    <button type="button" class="hover:text-white transition-colors" title="Pause">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                        </svg>
                    </button>
                    <button type="button" class="hover:text-white transition-colors" title="Next">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- ============ Detail Informasi Podcast ============ --}}
        <div class="mt-5">
            {{-- Chips Tanggal & Durasi --}}
            <div class="flex items-center gap-2">
                <span class="flex h-7 items-center gap-2 rounded-lg bg-[#211f26] px-3 text-xs font-medium tracking-[0.1px] text-[#e6e0e9]">
                    <svg class="h-3.5 w-3.5 text-[#cac4d0]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/>
                    </svg>
                    {{ $podcast['date'] }}
                </span>
                <span class="flex h-7 items-center gap-2 rounded-lg bg-[#211f26] px-3 text-xs font-medium tracking-[0.1px] text-[#e6e0e9]">
                    <svg class="h-3.5 w-3.5 text-[#cac4d0]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                    </svg>
                    {{ $podcast['duration'] }}
                </span>
            </div>

            {{-- Judul Podcast --}}
            <h2 class="mt-3 text-2xl sm:text-3xl font-medium text-white tracking-tight">
                {{ $podcast['title'] }}
            </h2>

            {{-- Deskripsi Paragraf --}}
            <div class="mt-2 space-y-2 text-xs sm:text-sm text-[#cac4d0] leading-relaxed">
                <p>{{ $podcast['description_1'] }}</p>
                <p>{{ $podcast['description_2'] }}</p>
            </div>

            {{-- Tombol Aksi (Kanan Bawah Deskripsi: Like & Favorite) --}}
            <div class="mt-4 flex items-center justify-end gap-2.5">
                {{-- Heart Button --}}
                <button type="button" class="flex h-8 w-8 items-center justify-center rounded-full bg-[#d0bcff] text-[#381e72] hover:bg-[#dccdff] transition-colors" title="Suka">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                </button>

                {{-- Star Button --}}
                <button type="button" class="flex h-8 w-8 items-center justify-center rounded-full bg-[#d0bcff] text-[#381e72] hover:bg-[#dccdff] transition-colors" title="Favorit">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- ============ Kolom Komentar ============ --}}
        <div class="mt-6">
            {{-- Input Komentar (Pill) --}}
            <div class="flex h-12 w-full items-center justify-between rounded-full bg-[#211f26] px-5">
                <input type="text"
                       placeholder="Leave a comment"
                       class="min-w-0 flex-1 bg-transparent text-sm text-[#e6e0e9] placeholder:text-[#8e8b9e] outline-none">
                <button type="button" class="shrink-0 text-[#cac4d0] hover:text-white transition-colors" title="Kirim">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>

            {{-- Daftar Komentar Dummy --}}
            <div class="mt-4 space-y-2.5">
                @foreach ($podcast['comments'] as $comment)
                    <div class="flex items-center gap-3">
                        {{-- Avatar Icon Geometris Sesuai Desain --}}
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#211f26]">
                            <svg class="h-4 w-4 text-[#cac4d0]" viewBox="0 0 24 24" fill="currentColor">
                                <circle cx="12" cy="7" r="3"/>
                                <rect x="6" y="13" width="5" height="5" rx="1"/>
                                <polygon points="17,13 14,18 20,18"/>
                            </svg>
                        </div>

                        {{-- Bubble Teks Komentar --}}
                        <div class="rounded-full bg-[#211f26] px-4 py-2 text-xs text-[#e6e0e9]">
                            {{ $comment }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
