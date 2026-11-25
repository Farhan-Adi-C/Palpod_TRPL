@extends('layouts.app')

@section('title', 'Palpod - Home')

@section('topbar')
    @include('components.topbar')
@endsection

@section('content')
    {{-- Font untuk badge EPS --}}
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    @php

        $hero = ['id' => 'nHlRu9JUhFo', 'eps' => 1, 'title' => 'Palpod is Back!'];

        $newRelease = [
            ['id' => 'nHlRu9JUhFo', 'eps' => 2],
            ['id' => 'nHlRu9JUhFo', 'eps' => 1],
            ['id' => 'nHlRu9JUhFo', 'eps' => 2],
            ['id' => 'nHlRu9JUhFo', 'eps' => 3],
        ];

        $topView = [
            ['id' => 'nHlRu9JUhFo', 'eps' => 2],
            ['id' => 'nHlRu9JUhFo', 'eps' => 1],
            ['id' => 'nHlRu9JUhFo', 'eps' => 2],
        ];

        $thumb = fn ($id, $size = 'maxresdefault') => "https://i.ytimg.com/vi/{$id}/{$size}.jpg";
        $watch = fn ($id) => "https://www.youtube.com/watch?v={$id}";
    @endphp

    {{-- ============ Featured / Hero ============ --}}
    <section class="relative  mb-8 h-[360px] overflow-hidden rounded-[28px] bg-[#2b2930] sm:h-[440px] lg:h-[420px]">
        <img src="{{ $thumb($hero['id']) }}"
             onerror="this.onerror=null;this.src='{{ $thumb($hero['id'], 'hqdefault') }}'"
             alt="{{ $hero['title'] }}" class="h-full w-full object-cover">

        {{-- Overlay gelap  --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/50 via-transparent to-transparent"></div>

        {{-- Konten --}}
        <div class="absolute bottom-4 left-4 right-4 sm:bottom-6 sm:left-6 sm:right-6">
            <h2 class="text-3xl font-medium leading-tight text-white sm:text-[40px] sm:leading-[48px]">{{ $hero['title'] }}</h2>
            <p class="text-xs tracking-[0.4px] text-[#e6e0e9]">Dari Vakum ke Rencana Gila Selanjutnya</p>

            {{-- Chips --}}
            <div class="mt-2 flex flex-wrap items-center gap-2.5">
                <span class="flex h-8 items-center gap-2 rounded-lg bg-[#1d1b20]/90 px-3 text-sm font-medium tracking-[0.1px] text-white">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/>
                    </svg>
                    17 Oktober 2025
                </span>
                <span class="flex h-8 items-center gap-2 rounded-lg bg-[#1d1b20]/90 px-3 text-sm font-medium tracking-[0.1px] text-white">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                    </svg>
                    19 mins
                </span>
            </div>

            {{-- Split button: Play + More --}}
            <div class="mt-2 flex items-center gap-0.5">
                <a href="{{ route('podcast.show', 1) }}"
                   class="flex h-14 items-center gap-2 rounded-l-[28px] rounded-r-[4px] bg-[#d0bcff] px-6 text-sm font-medium tracking-[0.1px] text-[#381e72] transition-colors hover:bg-[#dccdff]">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                    Play
                </a>
                <button type="button" aria-label="More"
                        class="flex h-14 w-14 items-center justify-center rounded-l-[4px] rounded-r-[28px] bg-[#d0bcff] text-[#381e72] transition-colors hover:bg-[#dccdff]">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    {{-- ============ New Realese ============ --}}
    <section class="mb-8">
        <div class="mb-8 flex h-7 items-center gap-3">
            <h3 class="text-[22px] leading-7 text-[#e6e0e9]">New Realese</h3>
            <svg class="h-6 w-6 text-[#e6e0e9]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
            </svg>
        </div>

        {{-- Carousel: scroll horizontal hanya di dalam baris ini, bukan di halaman --}}
        <div class="-ml-2 -mr-4 flex gap-2 overflow-x-auto pb-2 sm:-mr-6 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
            @foreach ($newRelease as $video)
                <a href="{{ route('podcast.show', 1) }}"
                   class="relative block aspect-video w-[280px] shrink-0 overflow-hidden rounded-3xl bg-[#211f26] sm:w-[362px]">
                    <img src="{{ $thumb($video['id']) }}"
                         onerror="this.onerror=null;this.src='{{ $thumb($video['id'], 'hqdefault') }}'"
                         alt="New release episode {{ $video['eps'] }}" loading="lazy" class="h-full w-full object-cover">
                </a>
            @endforeach
        </div>
    </section>

    {{-- ============ Top View ============ --}}
    <section class="mb-8">
        <div class="mb-8 flex h-7 items-center gap-3">
            <h3 class="text-[22px] leading-7 text-[#e6e0e9]">Top View</h3>
            <svg class="h-6 w-6 text-[#e6e0e9]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
            </svg>
        </div>

        <div class="-ml-2 -mr-4 flex gap-2 overflow-x-auto pb-2 sm:-mr-6 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
            @foreach ($topView as $video)
                <a href="{{ $watch($video['id']) }}" target="_blank" rel="noopener noreferrer"
                   class="relative block aspect-video w-[280px] shrink-0 overflow-hidden rounded-3xl bg-[#211f26] sm:w-[362px]">
                    <img src="{{ $thumb($video['id']) }}"
                         onerror="this.onerror=null;this.src='{{ $thumb($video['id'], 'hqdefault') }}'"
                         alt="Top view episode {{ $video['eps'] }}" loading="lazy" class="h-full w-full object-cover">
                </a>
            @endforeach

        </div>
    </section>

    {{-- ============ Audio Podcast ============ --}}
    <section>
        <div class="mb-5 flex h-7 items-center gap-3">
            <h3 class="text-[22px] leading-7 text-[#e6e0e9]">Audio Podcast</h3>
            <svg class="h-6 w-6 text-[#e6e0e9]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
            </svg>
        </div>

        @php
            $audioPodcasts = [
                [
                    'title' => 'Inpirasi mahasiswa juara: Cerita sukses di Samsung Solve for Tomorrow',
                    'desc' => 'Supporting line text lorem ipsum dolor sit amet, consectetur.',
                    'date' => '17 Oktober 2025',
                    'duration' => '32 Mins',
                ],
                [
                    'title' => 'Transformasi digital: Inovasi pendidikan untuk masa depan',
                    'desc' => 'Meningkatkan efisiensi dan efektivitas belajar melalui teknologi.',
                    'date' => '25 November 2025',
                    'duration' => '45 Mins',
                ],
                [
                    'title' => 'Kewirausahaan sosial: Mengubah dunia dengan ide brilian',
                    'desc' => 'Menemukan peluang untuk menciptakan dampak positif.',
                    'date' => '10 Desember 2025',
                    'duration' => '30 Mins',
                ],
                [
                    'title' => 'Kepemimpinan yang inspiratif: Kisah sukses pemimpin muda',
                    'desc' => 'Menjadi panutan dan membawa perubahan di komunitas.',
                    'date' => '5 Januari 2026',
                    'duration' => '50 Mins',
                ],
                [
                    'title' => 'Pengembangan keterampilan abad 21: Mempersiapkan generasi masa depan',
                    'desc' => 'Mengasah kemampuan kritis dan kreatif untuk tantangan global.',
                    'date' => '15 Februari 2026',
                    'duration' => '40 Mins',
                ],
            ];
        @endphp

        <div class="flex flex-col">
            @foreach ($audioPodcasts as $podcast)
                <div class="flex items-center gap-3 border-b border-[#36343b] pb-3 pt-4 sm:gap-4">
                    {{-- Thumbnail placeholder --}}
                    <div class="h-16 w-16 shrink-0 overflow-hidden rounded-xl bg-[#2b2930] sm:h-20 sm:w-20">
                        <svg class="h-full w-full" viewBox="0 0 80 80" fill="#cac4d0">
                            <path d="M41 17 L52 35 H30 Z" stroke="#cac4d0" stroke-width="5" stroke-linejoin="round"/>
                            <circle cx="26" cy="52" r="8"/>
                            <circle cx="26" cy="52" r="9.5" fill="none" stroke="#cac4d0" stroke-width="4" stroke-dasharray="3 2.7"/>
                            <rect x="43" y="41" width="22" height="22" rx="5"/>
                        </svg>
                    </div>

                    {{-- Teks --}}
                    <div class="min-w-0 flex-1">
                        <h4 class="truncate text-base leading-6 text-[#e6e0e9] sm:text-xl sm:leading-7">{{ $podcast['title'] }}</h4>
                        <p class="mt-1 truncate text-sm leading-5 tracking-[0.25px] text-[#cac4d0] sm:mt-2">{{ $podcast['desc'] }}</p>
                        <p class="truncate text-sm leading-5 tracking-[0.25px] text-[#cac4d0]">{{ $podcast['date'] }} • {{ $podcast['duration'] }}</p>
                    </div>

                    {{-- Tombol Play --}}
                    <button type="button" aria-label="Play {{ $podcast['title'] }}"
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#d0bcff] text-[#381e72] transition-colors hover:bg-[#dccdff] sm:h-14 sm:w-14">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>
    </section>
@endsection