<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Berita;

class PublicController extends Controller
{
    // Fungsi untuk menampilkan halaman data guru
    public function dataGuru()
    {
        $semuaGuru = Guru::all();

        return view('dataguru', [
            'daftarGuru' => $semuaGuru
        ]);
    }

    public function portalBerita()
    {
        $semuaBerita = Berita::with(['user', 'kategori'])
                             ->where('status', 'published')
                             ->latest()
                             ->paginate(9);

        // Kirim data ke view 'portal'
        return view('portal', [
            'daftarBerita' => $semuaBerita
        ]);
    }

    public function home()
    {
        // Ambil 9 berita terbaru yang statusnya 'published'
        $beritaTerkini = Berita::where('status', 'published')
                               ->latest() // Mengurutkan dari yang terbaru
                               ->take(9)    
                               ->get();

        return view('home', [
            'daftarBerita' => $beritaTerkini
        ]);
    }
}
