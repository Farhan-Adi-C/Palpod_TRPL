<?php

use App\Http\Controllers\AudioPodcastController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewReleaseController;
use App\Http\Controllers\PodcastController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/new-release', [NewReleaseController::class, 'index'])->name('new-release');
Route::get('/podcast/{id?}', [PodcastController::class, 'show'])->name('podcast.show');
Route::get('/audio-podcast', [AudioPodcastController::class, 'index'])->name('audio-podcast');
Route::get('/audio_podcast', [AudioPodcastController::class, 'index']);
