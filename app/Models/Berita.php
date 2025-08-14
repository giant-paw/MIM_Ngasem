<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'kategori_id', 
        'user_id',
        'judul',
        'slug',
        'kutipan', 
        'konten',
        'gambar_utama', 
        'status', 
    ];

    // Definisikan relasi ke model User (sudah ada)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Definisikan relasi ke model Kategori (baru)
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}