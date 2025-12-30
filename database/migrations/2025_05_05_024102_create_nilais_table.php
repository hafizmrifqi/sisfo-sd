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

            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->onDelete('set null');

            $table->foreignId('kompetensi_id')->nullable()->constrained('kompetensis')->onDelete('set null');

            // Nilai
            $table->float('nilai')->default(0); // Misalnya 85.5

            // Opsional: tambahkan semester dan tahun ajaran
            $table->enum('jenis', ['harian', 'uts', 'uas', 'tugas', 'project'])->default('harian'); // Jenis nilai: harian, UTS, UAS
            $table->string('semester')->nullable(); // Contoh: "Ganjil", "Genap"
            $table->integer('tahun_ajaran')->default(date('Y')); // Contoh: 2025

            // Timestamps
            $table->timestamps();

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
