<?php

namespace App\Http\Controllers;

use App\Models\Kontak;

class LandingPageController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();
        return view('welcome', compact('kontak'));
    }
}
