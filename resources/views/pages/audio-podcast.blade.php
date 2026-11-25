@extends('layouts.app')

@section('title', 'Palpod - Audio Podcast')

@section('container_class', 'bg-[#141218]')
@section('main_class', 'pb-2.5')

@section('content')
    @php
        $bars = [12, 53, 67, 99, 55, 26, 51, 69, 15, 23, 97, 23, 71, 81, 15, 32, 96, 96, 42, 73, 15, 88, 48, 29, 44, 91, 100, 20, 65, 32, 86, 68, 64, 13, 100, 60, 52, 32, 62, 59];
    @endphp

    {{-- Grid 2 kolom (kiri fleksibel, kanan tetap) --}}
    <div class="grid min-h-[calc(100vh-1.25rem)] grid-cols-1 gap-2.5 md:grid-cols-[minmax(0,1fr)_340px] lg:grid-cols-[minmax(0,1fr)_410px]">

        {{-- ================= KIRI: Player + New Video ================= --}}
        <section class="flex min-w-0 flex-col justify-between gap-16 px-4 pb-10 pt-12 sm:px-6 lg:px-8 lg:pb-[86px] lg:pt-[118px]">

            {{-- Player --}}
            <div class="mx-auto w-full max-w-[644px]">

                {{-- Waveform + glow --}}
                <div class="relative flex h-36 items-center justify-center">
                    <div class="pointer-events-none absolute inset-0 m-auto h-72 w-72 rounded-full bg-[#d0bcff]/15 blur-3xl"></div>
                    <div class="relative flex h-full items-center gap-1">
                        @foreach ($bars as $h)
                            <span class="w-1 rounded-full bg-[#d0bcff]" style="height: {{ $h }}%"></span>
                        @endforeach
                    </div>
                </div>

                {{-- Judul (di design posisinya rata kiri, lebar 192px, teks center) --}}
                <div class="mt-[107px] w-48 text-center text-base leading-8">
                    <p class="text-white">{{ $currentTrack['title'] }}</p>
                    <p class="text-[#d0bcff]">{{ $currentTrack['episode'] }}</p>
                </div>

                {{-- Progress --}}
                <div class="mt-[53px]">
                    <div class="h-1.5 w-full rounded-full bg-[#36343b]">
                        <div class="h-full rounded-full bg-[#d0bcff]" style="width: {{ $currentTrack['progress'] }}%"></div>
                    </div>
                    <div class="mt-2 flex items-center justify-between text-base leading-6 text-[#e6e0e9]">
                        <span>{{ $currentTrack['current_time'] }}</span>
                        <span>{{ $currentTrack['total_time'] }}</span>
                    </div>
                </div>

                {{-- Kontrol --}}
                <div class="mt-1 flex items-center justify-between text-[#e6e0e9]">
                    <button type="button" title="Shuffle" class="flex h-12 w-12 items-center justify-center transition-colors hover:text-white">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M10.59 9.17L5.41 4 4 5.41l5.17 5.17 1.42-1.41zM14.5 4l2.04 2.04L4 18.59 5.41 20 17.96 7.46 20 9.5V4h-5.5zm.33 9.41l-1.41 1.41 3.13 3.13L14.5 20H20v-5.5l-2.04 2.04-3.13-3.13z"/>
                        </svg>
                    </button>

                    <div class="flex items-center gap-5">
                        <button type="button" title="Rewind 5s" class="flex h-12 w-12 items-center justify-center transition-colors hover:text-white">
                            <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4.5A8.5 8.5 0 1 0 19.5 13"/>
                                <polyline points="11 1 11 5 15 5"/>
                                <text x="9.5" y="14" font-size="7.5" fill="currentColor" stroke="none" font-weight="bold" font-family="sans-serif">5</text>
                            </svg>
                        </button>

                        <button type="button" title="Pause"
                                class="flex h-20 w-20 items-center justify-center rounded-full bg-[#d0bcff] text-[#381e72] transition-transform hover:scale-105 hover:bg-[#dccdff] active:scale-95">
                            <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                            </svg>
                        </button>

                        <button type="button" title="Forward 5s" class="flex h-12 w-12 items-center justify-center transition-colors hover:text-white">
                            <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M13 4.5A8.5 8.5 0 1 1 4.5 13"/>
                                <polyline points="13 1 13 5 9 5"/>
                                <text x="10.5" y="14" font-size="7.5" fill="currentColor" stroke="none" font-weight="bold" font-family="sans-serif">5</text>
                            </svg>
                        </button>
                    </div>

                    {{-- Repeat: menempel ke tepi kanan progress bar seperti di design --}}
                    <button type="button" title="Repeat" class="flex h-12 w-9 items-center justify-end transition-colors hover:text-white">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 7h10v3l4-4-4-4v3H5v6h2V7zm10 10H7v-3l-4 4 4 4v-3h12v-6h-2v4z"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- New Video --}}
            <div class="w-full">
                <div class="mb-6 flex items-center justify-between text-base leading-6">
                    <h4 class="text-[#e6e0e9]">New Video</h4>
                    <a href="/new-release" class="uppercase tracking-widest text-[#d0bcff] transition-colors hover:text-white">View all</a>
                </div>

                <div class="space-y-4">
                    @foreach ($newVideos as $video)
                        <div class="flex cursor-pointer items-center justify-between gap-4 rounded-[28px] border border-[#2b2930] p-4 transition-colors hover:bg-white/5">
                            <div class="flex min-w-0 items-center gap-4">
                                <div class="h-16 w-16 shrink-0 rounded-lg {{ $video['bg'] ?? 'bg-[#36343b]' }}"></div>
                                {{-- max-w supaya judul panjang turun ke baris berikutnya (seperti "Silicon Dreams: Hardware / Limits") --}}
                                <div class="min-w-0 max-w-[224px] text-base leading-6 {{ $video['is_locked'] ? 'text-[#938f99]' : 'text-[#e6e0e9]' }}">
                                    <p>{{ $video['title'] }}</p>
                                    <p>{{ $video['duration'] }}</p>
                                    <p>{{ $video['frequency'] }}</p>
                                </div>
                            </div>

                            @if ($video['is_locked'])
                                <div class="-mr-[5px] shrink-0 text-[#938f99]">
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>
                                    </svg>
                                </div>
                            @else
                                <div class="-mr-[11px] shrink-0 text-[#e6e0e9]">
                                    <button type="button" title="More" class="block transition-colors hover:text-white">
                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                                        </svg>
                                    </button>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ================= KANAN: Detail Podcast ================= --}}
        <aside class="rounded-[28px] bg-[#0f0d13] p-5 lg:p-6">

            {{-- 3 tombol atas --}}
            <div class="mb-7 flex items-center justify-end gap-3 px-1 pt-1">
                <button type="button" title="Favorite" class="flex h-10 w-10 items-center justify-center rounded-full bg-[#d0bcff] text-[#381e72] transition-colors hover:bg-[#dccdff]">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm4.24 16L12 15.45 7.77 18l1.12-4.81-3.73-3.23 4.92-.42L12 5l1.92 4.53 4.92.42-3.73 3.23L16.23 18z"/>
                    </svg>
                </button>
                <button type="button" title="Bookmark" class="flex h-10 w-10 items-center justify-center rounded-full bg-[#2b2930] text-[#cac4d0] transition-colors hover:text-white">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm4.24 16L12 15.45 7.77 18l1.12-4.81-3.73-3.23 4.92-.42L12 5l1.92 4.53 4.92.42-3.73 3.23L16.23 18z"/>
                    </svg>
                </button>
                <button type="button" data-sidebar-toggle title="Toggle Layout" class="flex h-10 w-10 items-center justify-center rounded-full bg-[#d0bcff] text-[#381e72] transition-colors hover:bg-[#dccdff]">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 4H5c-1.11 0-2 .9-2 2v12c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-9 14H5V6h5v12zm9 0h-7V6h7v12z"/>
                    </svg>
                </button>
            </div>

            {{-- Thumbnail --}}
            <div class="relative aspect-video w-full overflow-hidden rounded-2xl bg-black">
                <img src="https://i.ytimg.com/vi/{{ $detailPodcast['youtube_id'] }}/maxresdefault.jpg"
                     onerror="this.onerror=null;this.src='https://i.ytimg.com/vi/{{ $detailPodcast['youtube_id'] }}/hqdefault.jpg'"
                     alt="{{ $detailPodcast['title'] }}"
                     class="h-full w-full object-cover">
                <a href="/podcast/{{ $detailPodcast['id'] }}" title="Play"
                   class="absolute inset-0 m-auto flex h-14 w-14 items-center justify-center rounded-full bg-[#d0bcff]/80 text-white/80 transition-transform hover:scale-110 active:scale-95">
                    <svg class="ml-0.5 h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                </a>
            </div>

            {{-- Chips --}}
            <div class="mt-6 flex items-center gap-2">
                <span class="flex h-8 items-center gap-2 rounded-lg bg-[#211f26] px-3 text-sm font-medium text-[#e6e0e9]">
                    <svg class="h-4 w-4 text-[#d0bcff]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/>
                    </svg>
                    {{ $detailPodcast['date'] }}
                </span>
                <span class="flex h-8 items-center gap-2 rounded-lg bg-[#211f26] px-3 text-sm font-medium text-[#e6e0e9]">
                    {{-- ikon alarm (di design berupa jam alarm, bukan jam biasa) --}}
                    <svg class="h-4 w-4 text-[#d0bcff]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22 5.72l-4.6-3.86-1.29 1.53 4.6 3.86L22 5.72zM7.88 3.39L6.6 1.86 2 5.71l1.29 1.53 4.59-3.85zM12.5 8H11v6l4.75 2.85.75-1.23-4-2.37V8zM12 4c-4.97 0-9 4.03-9 9s4.02 9 9 9c4.97 0 9-4.03 9-9s-4.03-9-9-9zm0 16c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z"/>
                    </svg>
                    {{ $detailPodcast['duration'] }}
                </span>
            </div>

            {{-- Judul & deskripsi --}}
            <h3 class="mt-3 text-2xl leading-8 text-white">{{ $detailPodcast['title'] }}</h3>
            <div class="mt-1 space-y-5 text-sm leading-5 text-[#e6e0e9]">
                <p>{{ $detailPodcast['description_1'] }}</p>
                <p class="truncate">{{ $detailPodcast['description_2'] }}</p>
            </div>

            {{-- Like & Share --}}
            <div class="mt-5 flex items-center justify-end gap-4 pr-2">
                <button type="button" title="Like" class="flex h-8 w-8 items-center justify-center rounded-full bg-[#d0bcff] text-[#381e72] transition-colors hover:bg-[#dccdff]">
                    <svg class="h-[18px] w-[18px]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z"/>
                    </svg>
                </button>
                <button type="button" title="Share" class="flex h-8 w-8 items-center justify-center rounded-full bg-[#d0bcff] text-[#381e72] transition-colors hover:bg-[#dccdff]">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92s2.92-1.31 2.92-2.92c0-1.61-1.31-2.92-2.92-2.92z"/>
                    </svg>
                </button>
            </div>

            {{-- Input komentar --}}
            <div class="mt-8 flex h-14 items-center rounded-full bg-[#2b2930] pl-6 pr-4">
                <input type="text" placeholder="Leave a comment"
                       class="min-w-0 flex-1 bg-transparent text-base text-[#e6e0e9] outline-none placeholder:text-[#cac4d0]">
                <button type="button" title="Search" class="shrink-0 text-[#cac4d0] transition-colors hover:text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>

            {{-- Daftar komentar --}}
            <div class="mt-3 space-y-3">
                @foreach ($detailPodcast['comments'] as $comment)
                    <div class="flex items-center gap-2">
                        {{-- Avatar: segitiga (atas), lingkaran (kiri bawah), kotak (kanan bawah) --}}
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#2b2930] text-[#cac4d0]">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                                <polygon points="12,3 8,9.5 16,9.5"/>
                                <circle cx="8" cy="16.5" r="3.3"/>
                                <rect x="13" y="13.2" width="6.6" height="6.6" rx="1.3"/>
                            </svg>
                        </div>
                        <div class="flex h-[42px] items-center rounded-full bg-[#2b2930] px-4 text-base text-[#e6e0e9]">
                            {{ $comment }}
                        </div>
                    </div>
                @endforeach
            </div>
        </aside>
    </div>
@endsection