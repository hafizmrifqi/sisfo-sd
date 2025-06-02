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
        Schema::create('anggota_kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->onDelete('cascade');
            $table->foreignId('siswa_id')->nullable()->constrained('siswa')->onDelete('cascade');

            // Jika ada foreign key untuk siswa_id, pastikan tabel siswas sudah ada
            $table->unique(['kelas_id', 'siswa_id']);

            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif'); // Status keanggotaan, bisa 'aktif', 'non-aktif', dll.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_kelas');
    }
};
