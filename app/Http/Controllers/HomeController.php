<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::latest()->take(6)->get(); // Example: get latest 6 services
        $products = Product::latest()->take(6)->get(); // Example: get latest 6 products
        return view('website.pages.home', compact(['services', 'products']));
    }
}
