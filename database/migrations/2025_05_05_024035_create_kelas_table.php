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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas'); // Contoh: "Kelas 1A", "Kelas 2B"
            $table->foreignId('wali_kelas_id')->nullable()->constrained('gurus')->onDelete('set null'); // Relasi ke tabel guru
            $table->year('tahun_ajaran')->default(date('Y')); // Tahun ajaran, misalnya 2025
            $table->unsignedBigInteger('jumlah_siswa')->default(0); // Bisa diupdate otomatis lewat observer atau event
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
