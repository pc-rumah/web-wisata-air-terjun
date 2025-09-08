<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class GaleriController extends Controller
{
    private function optimizeImage($imagePath)
    {
        $fullPath = storage_path('app/public/' . $imagePath);
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize($fullPath);
        return $imagePath;
    }

    public function index()
    {
        $galeri = Galeri::paginate(5);
        return view('dash.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('dash.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:png,jpg,webp|max:4096'
        ]);

        $data = $request->only(['nama', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('galeri', 'public');
            $data['gambar'] = $this->optimizeImage($imagePath);
        }

        Galeri::create($data);

        return redirect()->route('galeri.index')->with('success', 'Berhasil Menambah Data!');
    }

    public function show(Galeri $galeri)
    {
        //
    }

    public function edit(Galeri $galeri)
    {
        return view('dash.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:png,jpg,webp|max:4096'
        ]);

        $data = $request->only(['nama', 'deskripsi']);

        if ($request->hasFile('gambar')) {

            if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
                Storage::disk('public')->delete($galeri->gambar);
            }
            $imagePath = $request->file('gambar')->store('galeri', 'public');

            $fullPath = storage_path('app/public/' . $imagePath);

            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize($fullPath);

            $data['gambar'] = $imagePath;
        }

        $galeri->update($data);
        return redirect()->route('galeri.index')->with('success', 'Berhasil Mengupdate Data!');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return redirect()->back()->with('success', 'Data Berhasil dihapus!');
    }
}
