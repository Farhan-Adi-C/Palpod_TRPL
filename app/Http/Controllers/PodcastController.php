<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PodcastController extends Controller
{
    /**
     * Display the specified podcast detail page.
     */
    public function show(string|int $id = 1): View
    {
        $podcast = [
            'id' => $id,
            'youtube_id' => 'nHlRu9JUhFo',
            'eps' => 1,
            'title' => 'Palpod is Back!',
            'subtitle' => 'Dari Vakum ke Rencana Gila Selanjutnya',
            'date' => '17 Oktober 2025',
            'duration' => '19 mins',
            'current_time' => '12.00',
            'total_time' => '19.00',
            'description_1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'description_2' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'comments' => [
                'that looks so good!',
                "I can't believe how amazing this is!",
                'This design really stands out!',
                'What a stunning color palette!',
                'This is truly a work of art!',
            ],
        ];

        return view('pages.podcast-detail', compact('podcast'));
    }
}
