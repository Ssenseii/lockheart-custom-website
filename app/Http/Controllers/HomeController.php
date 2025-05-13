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
        $references = Reference::latest()->get(); 
        
        $services = Service::latest()->take(6)->get(); // Example: get latest 6 services
        $products = Product::latest()->take(6)->get(); // Example: get latest 6 products
        $blogs = Blog::latest()->take(6)->get(); // Example: get latest 6 blogs
        $testimonials = Testimonial::latest()->take(6)->get(); // Example: get latest 6 references
        return view('website.pages.home', compact(['services', 'products', 'blogs', 'references', 'testimonials']));
    }
}
