<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::latest()->take(6)->get(); // Example: get latest 6 services
        return view('website.pages.home', compact('services'));
    }
}
