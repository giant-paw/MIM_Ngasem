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
        // 1. Validasi Input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jabatan'      => 'required|string|max:255',
            'mapel_diampu' => 'nullable|string',
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Maks 2MB
        ]);

        $pathFoto = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $pathFoto = $file->storeAs('public/foto_guru', $namaFile);
        }

        Guru::create([
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan'      => $request->jabatan,
            'mapel_diampu' => $request->mapel_diampu,
            'foto'         => $pathFoto, 
        ]);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    public function edit(Guru $guru)
    {
        // Tampilkan halaman edit dan kirim data guru yang akan diedit
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'mapel_diampu' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $pathFoto = $guru->foto; // Gunakan foto lama sebagai default
        // 2. Proses upload foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($guru->foto) {
                Storage::delete($guru->foto);
            }
            // Simpan foto baru
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $pathFoto = $file->storeAs('public/foto_guru', $namaFile);
        }

        // 3. Update data di database
        $guru->update([
            'nama_lengkap' => $validatedData['nama_lengkap'],
            'jabatan' => $validatedData['jabatan'],
            'mapel_diampu' => $validatedData['mapel_diampu'],
            'foto' => $pathFoto,
        ]);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        // Hapus foto dari storage jika ada
        if ($guru->foto) {
            Storage::delete($guru->foto);
        }

        // Hapus data dari database
        $guru->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
