@extends('layouts.app')

@section('title', 'Palpod - New Realese')

@section('content')
    {{-- Font untuk badge EPS  --}}
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    @php

        $hero = ['id' => 'nHlRu9JUhFo', 'eps' => 1, 'title' => 'Palpod is Back!'];

        $allPodcasts = [
            ['id' => 'nHlRu9JUhFo', 'eps' => 1],
            ['id' => 'nHlRu9JUhFo', 'eps' => 2],
            ['id' => 'nHlRu9JUhFo', 'eps' => 3],
            ['id' => 'nHlRu9JUhFo', 'eps' => 4],
            ['id' => 'nHlRu9JUhFo', 'eps' => 5],
            ['id' => 'nHlRu9JUhFo', 'eps' => 6],
            ['id' => 'nHlRu9JUhFo', 'eps' => 7],
            ['id' => 'nHlRu9JUhFo', 'eps' => 8],
        ];

        $thumb = fn ($id, $size = 'maxresdefault') => "https://i.ytimg.com/vi/{$id}/{$size}.jpg";
        $watch = fn ($id) => "https://www.youtube.com/watch?v={$id}";
    @endphp

    {{-- ============ Featured / Hero ============ --}}
    <section class="relative mb-8 h-[360px] overflow-hidden rounded-[28px] bg-[#2b2930] sm:h-[440px] lg:h-[420px]">
        <img src="{{ $thumb($hero['id']) }}"
             onerror="this.onerror=null;this.src='{{ $thumb($hero['id'], 'hqdefault') }}'"
             alt="{{ $hero['title'] }}" class="h-full w-full object-cover">

        {{-- Overlay gelap --}}
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
                <a href="{{ $watch($hero['id']) }}" target="_blank" rel="noopener noreferrer"
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

    {{-- ============ Daftar Podcast ============ --}}

    <style>
        .podcast-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 8px;
        }
        @media (min-width: 640px) {
            .podcast-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 12px;
            }
        }
        .podcast-card {
            position: relative;
            display: block;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            border-radius: 16px;
            background: #211f26;
        }
        .podcast-card img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .2s ease;
        }
        .podcast-card:hover img { transform: scale(1.04); }
    </style>

    <section class="mb-8">
        <div class="podcast-grid">
            @foreach ($allPodcasts as $video)
                <a href="{{ $watch($video['id']) }}" target="_blank" rel="noopener noreferrer" class="podcast-card">
                    <img src="{{ $thumb($video['id']) }}"
                         onerror="this.onerror=null;this.src='{{ $thumb($video['id'], 'hqdefault') }}'"
                         alt="Episode {{ $video['eps'] }}" loading="lazy">
                </a>
            @endforeach
        </div>
    </section>
@endsection