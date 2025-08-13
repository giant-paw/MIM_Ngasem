<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; 

class BeritaController extends Controller
{
    public function index()
    {
        // Mengambil data berita dengan nama penulisnya (relasi)
        // Diurutkan dari yang terbaru dan menggunakan paginasi
        $dataBerita = Berita::with('user')->latest()->paginate(10);

        return view('admin.berita.index', compact('dataBerita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar_header' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pathGambar = null;
        // 2. Proses Upload Gambar
        if ($request->hasFile('gambar_header')) {
            $file = $request->file('gambar_header');
            $namaFile = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $pathGambar = $file->storeAs('gambar_berita', $namaFile, 'public');
        }

        // 3. Simpan Data ke Database
        Berita::create([
            'judul' => $validatedData['judul'],
            'slug' => Str::slug($validatedData['judul']), // Buat slug dari judul
            'konten' => $validatedData['konten'],
            'gambar_header' => $pathGambar,
            'user_id' => Auth::id(), // Ambil ID admin yang sedang login
        ]);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diterbitkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        //
    }
}
