<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewReleaseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/new-release', [NewReleaseController::class, 'index'])->name('new-release');
