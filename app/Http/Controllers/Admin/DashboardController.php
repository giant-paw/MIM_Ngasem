<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru; 
use App\Models\Berita; 
use App\Models\User;    
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahGuru = Guru::count();
        $jumlahBerita = Berita::count();
        // $jumlahAdmin = User::where('role', 'admin')::count();
        $jumlahAdmin = User::where('role', 'admin')->count();
        $jumlahKategori = Kategori::count();    

        return view('admin.dashboard', [
            'jumlahGuru' => $jumlahGuru,
            'jumlahBerita' => $jumlahBerita,
            'jumlahAdmin' => $jumlahAdmin,       
            'jumlahKategori' => $jumlahKategori, 
        ]);
    }
}