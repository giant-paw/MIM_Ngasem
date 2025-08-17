<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; 
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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

     public function edit(Berita $berita)
    {
        // Ambil semua kategori untuk dropdown
        $kategori = Kategori::all();
        // Tampilkan halaman edit, kirim data berita dan data kategori
        return view('admin.berita.edit', compact('berita', 'kategori'));
    }

    public function update(Request $request, Berita $berita)
    {
        // 1. Validasi
        $validatedData = $request->validate([
            'judul' => ['required', 'string', 'max:255', Rule::unique('berita')->ignore($berita->id)],
            'kategori_id' => 'required|exists:kategori,id',
            'kutipan' => 'nullable|string|max:255',
            'konten' => 'required|string',
            'status' => 'required|in:draft,published',
            'gambar_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pathGambar = $berita->gambar_utama;
        // 2. Proses upload gambar baru jika ada
        if ($request->hasFile('gambar_utama')) {
            // Hapus gambar lama agar tidak menumpuk
            if ($berita->gambar_utama) {
                Storage::delete($berita->gambar_utama);
            }
            // Simpan gambar baru
            $file = $request->file('gambar_utama');
            $namaFile = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $pathGambar = $file->storeAs('gambar_berita', $namaFile, 'public');
        }
        
        // 3. Update data di database
        $berita->update([
            'judul' => $validatedData['judul'],
            'slug' => Str::slug($validatedData['judul']),
            'kategori_id' => $validatedData['kategori_id'],
            'kutipan' => $validatedData['kutipan'],
            'konten' => $validatedData['konten'],
            'status' => $validatedData['status'],
            'gambar_utama' => $pathGambar,
        ]);
        
        // 4. Redirect dengan pesan sukses
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        // 1. Hapus gambar utama dari storage jika ada
        if ($berita->gambar_utama) {
            Storage::delete($berita->gambar_utama);
        }

            // 2. (Advanced) Hapus semua gambar sisipan dari Trix Editor di dalam konten
            // Regex untuk menemukan semua URL gambar yang diupload dari Trix
        preg_match_all('/<img src="[^"]*\/storage\/berita_konten\/([^"]+)"[^>]*>/', $berita->konten, $matches);

        if (!empty($matches[1])) {
            foreach ($matches[1] as $filename) {
                // Hapus setiap file gambar yang ditemukan di dalam konten
                Storage::delete('public/berita_konten/' . $filename);
            }
        }

        // 3. Hapus data dari database
        $berita->delete();

        // 4. Redirect dengan pesan sukses
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus beserta semua gambarnya.');
    }
}
