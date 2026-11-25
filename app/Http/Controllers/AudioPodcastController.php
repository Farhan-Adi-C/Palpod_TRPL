<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AudioPodcastController extends Controller
{
    /**
     * Display the audio podcast player and list page.
     */
    public function index(): View
    {
        $currentTrack = [
            'title' => 'Judul Video',
            'episode' => 'Episode 142',
            'current_time' => '18:24',
            'total_time' => '42:10',
            'progress' => 44,
        ];

        $newVideos = [
            [
                'title' => 'Judul video',
                'duration' => '38 mins',
                'frequency' => 'Weekly',
                'bg' => 'bg-[#383540]',
                'is_locked' => false,
            ],
            [
                'title' => 'Judul Video',
                'duration' => '52 mins',
                'frequency' => 'Weekly',
                'bg' => 'bg-[#383540]',
                'is_locked' => false,
            ],
            [
                'title' => 'Silicon Dreams: Hardware Limits',
                'duration' => '45 mins • Tech Pulse',
                'frequency' => 'Weekly',
                'bg' => 'bg-[#3d272d]',
                'is_locked' => true,
            ],
        ];

        $detailPodcast = [
            'id' => 1,
            'youtube_id' => 'nHlRu9JUhFo',
            'eps' => 1,
            'title' => 'Palpod is Back!',
            'subtitle' => 'Dari Vakum ke Rencana Gila Selanjutnya',
            'date' => '17 Oktober 2025',
            'duration' => '19 mins',
            'description_1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'description_2' => 'Duis aute irure dolor in reprehenderit in voluptate velit...',
            'comments' => [
                'that looks so good!',
                "I can't believe how amazing this is!",
                'This design really stands out!',
                'What a stunning color palette!',
                'This is truly a work of art!',
            ],
        ];

        return view('pages.audio-podcast', compact('currentTrack', 'newVideos', 'detailPodcast'));
    }
}
