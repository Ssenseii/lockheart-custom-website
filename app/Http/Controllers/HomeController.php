<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Reference;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {

        $references = Reference::where('is_published', true)
            ->whereNotNull('company_logo')
            ->latest()
            ->paginate(24);

        $services = Service::latest()->take(2)->get();
        $products = Product::latest()->take(3)->get();

        return view('website.pages.home', compact(['services', 'products', 'references']));
    }
}
