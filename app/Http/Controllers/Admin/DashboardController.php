<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru; 
use App\Models\Berita; 

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahGuru = Guru::count();
        $jumlahBerita = Berita::count();

        return view('admin.dashboard', [
            'jumlahGuru' => $jumlahGuru,
            'jumlahBerita' => $jumlahBerita,
        ]);
    }
}