<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::latest()->get();
        $settings = cache()->get('site_settings');
        return view('website.pages.about', compact(['about', 'settings']));
    }
}
