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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();

            // Relasi ke siswa
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');

            // Relasi ke mata pelajaran
            $table->foreignId('mapel_id')->constrained('mapels')->onDelete('cascade');

            // Nilai
            $table->float('nilai')->default(0); // Misalnya 85.5

            // Opsional: tambahkan semester dan tahun ajaran
            $table->string('semester')->nullable(); // Contoh: "Ganjil", "Genap"
            $table->year('tahun_ajaran')->default(date('Y')); // Contoh: 2025

            // Timestamps
            $table->timestamps();

            // Agar tidak ada duplikasi nilai untuk satu siswa dan mapel di waktu tertentu
            $table->unique(['siswa_id', 'mapel_id', 'semester', 'tahun_ajaran']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
