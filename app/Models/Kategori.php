<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    
    protected $table = 'kategori';

    protected $fillable = ['nama', 'slug'];

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
