<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kategori;
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
        // Ambil semua data kategori untuk ditampilkan di dropdown
        $kategori = Kategori::all();
        return view('admin.berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id', // Validasi kategori
            'kutipan' => 'nullable|string|max:255',
            'konten' => 'required|string',
            'status' => 'required|in:draft,published', // Validasi status
            'gambar_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pathGambar = null;
        if ($request->hasFile('gambar_utama')) {
            $file = $request->file('gambar_utama');
            $namaFile = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $pathGambar = $file->storeAs('gambar_berita', $namaFile, 'public');
        }

        Berita::create([
            'judul' => $validatedData['judul'],
            'slug' => Str::slug($validatedData['judul']),
            'kategori_id' => $validatedData['kategori_id'],
            'kutipan' => $validatedData['kutipan'],
            'konten' => $validatedData['konten'],
            'status' => $validatedData['status'],
            'gambar_utama' => $pathGambar,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diterbitkan.');
    }

    public function uploadTrixImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('file');
        $path = $file->store('public/berita_konten'); // Simpan ke folder baru

        // Kembalikan URL publik dari gambar yang baru disimpan
        return response()->json(['url' => Storage::url($path)]);
    }

    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
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
