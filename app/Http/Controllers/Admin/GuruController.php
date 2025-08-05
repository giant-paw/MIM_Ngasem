<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        // Ambil semua data guru, diurutkan berdasarkan yang terbaru
        $dataGuru = Guru::latest()->paginate(10); // paginate(10) untuk membatasi 10 data per halaman

        // Kirim data ke view
        return view('admin.guru.index', compact('dataGuru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jabatan'      => 'required|string|max:255',
            'mapel_diampu' => 'nullable|string',
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 2. Cek apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');

            // 3. Cek apakah file-nya valid
            if (!$file->isValid()) {
                dd('File upload tidak valid.');
            }

            $namaFile = time() . '_' . $file->getClientOriginalName();

            try {
                // Coba simpan file
                $path = $file->storeAs('public/foto_guru', $namaFile);

                // Dapatkan path absolut dari folder storage
                $absoluteStoragePath = storage_path('app/public/foto_guru');

                // Hentikan dan tampilkan semuanya
                dd(
                    'Status: SUKSES MENYIMPAN!',
                    'Path Relatif yang disimpan Laravel:', $path,
                    'Seharusnya file ada di folder (Path Absolut):', $absoluteStoragePath
                );

            } catch (\Exception $e) {
                dd('GAGAL MENYIMPAN FILE!', 'Pesan Error:', $e->getMessage());
            }

        } else {
            dd('Tidak ada file foto yang terdeteksi dalam request.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        //
    }
}
