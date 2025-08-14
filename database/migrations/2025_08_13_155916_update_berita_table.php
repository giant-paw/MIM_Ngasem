<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('berita', function (Blueprint $table) {
            // Tambahkan kolom kategori_id
            $table->foreignId('kategori_id')->nullable()->after('id')->constrained('kategori');

            // Tambahkan kolom kutipan dan status
            $table->text('kutipan')->nullable()->after('slug');
            $table->enum('status', ['draft', 'published'])->default('draft')->after('konten');

            // Ubah nama kolom gambar_header menjadi gambar_utama
            $table->renameColumn('gambar_header', 'gambar_utama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berita', function (Blueprint $table) {
            // Hapus kolom yang ditambahkan
            $table->dropForeign(['kategori_id']);
            $table->dropColumn(['kategori_id', 'kutipan', 'status']);

            // Kembalikan nama kolom
            $table->renameColumn('gambar_utama', 'gambar_header');
        });
    }
};