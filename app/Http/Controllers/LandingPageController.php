<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kontak;

class LandingPageController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();
        $galeri = Galeri::all();
        return view('welcome', compact('kontak', 'galeri'));
    }
}
