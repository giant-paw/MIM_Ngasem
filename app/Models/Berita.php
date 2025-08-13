<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    
    // Daftarkan semua kolom yang bisa diisi
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar_header',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
