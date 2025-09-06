<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function create()
    {
        $kontak = Kontak::first();
        return view('dash.kontak.create', compact('kontak'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        $kontak = Kontak::first();

        if ($kontak) {
            $kontak->update($validated);
            $message = 'Data Berhasil diupdate!';
        } else {
            Kontak::create($validated);
            $message = 'Data Berhasil disimpan';
        }

        return redirect()->back()->with('success', $message);
    }
}
