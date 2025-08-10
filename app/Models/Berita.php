<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Definisikan relasi: Satu berita dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
