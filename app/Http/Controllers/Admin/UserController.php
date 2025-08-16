<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua pengguna yang rolenya 'admin', urutkan dari yang terbaru
        $users = User::where('role', 'admin')->latest()->paginate(10);

        // Kirim data ke view
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Buat User Baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // <-- Hashing Password
            'role' => 'admin', // <-- Set role secara otomatis
        ]);

        // 3. Redirect dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'Admin baru berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // 1. Validasi data yang masuk
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Update nama dan email
        $user->name = $request->name;
        $user->email = $request->email;

        // 3. Update password HANYA JIKA kolom password diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // 4. Simpan perubahan ke database
        $user->save();

        // 5. Redirect kembali ke halaman daftar admin dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'Data admin berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        // Fitur Keamanan: Pastikan admin tidak bisa menghapus akunnya sendiri
        if (Auth::id() === $user->id) {
            return redirect()->route('admin.users.index')->with('error', 'Anda tidak bisa menghapus akun Anda sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Admin berhasil dihapus.');
    }
}
