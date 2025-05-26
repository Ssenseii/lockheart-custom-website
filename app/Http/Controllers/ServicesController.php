<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function index()
    {
        $services = Service::all();
        return view('website.pages.services', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('website.pages.service', compact('service'));
    }
}
