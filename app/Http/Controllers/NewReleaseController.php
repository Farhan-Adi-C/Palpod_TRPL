<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class NewReleaseController extends Controller
{
    /**
     * Display the new release page.
     */
    public function index(): View
    {
        return view('pages.new-release');
    }
}
