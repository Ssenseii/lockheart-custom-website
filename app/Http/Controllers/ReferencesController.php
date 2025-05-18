<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use Illuminate\Http\Request;

class ReferencesController extends Controller
{

    public function index()
    {
        $references = Reference::latest()->get();

        return view('website.pages.references', compact(['references']));
    }
}
