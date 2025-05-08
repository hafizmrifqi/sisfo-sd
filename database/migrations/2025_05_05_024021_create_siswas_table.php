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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nipd')->unique()->nullable(); // Nomor Induk Siswa Nasional (unik, bisa null)
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('foto')->nullable(); // Path atau nama file foto siswa
            $table->unsignedBigInteger('kelas_id')->nullable(); // Foreign key ke tabel kelas
            $table->enum('status', ['aktif', 'tidak_aktif', 'lulus', 'pindah'])->default('aktif');
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes(); // Untuk fitur soft delete

            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
