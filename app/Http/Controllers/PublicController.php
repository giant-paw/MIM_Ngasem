<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

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
}
