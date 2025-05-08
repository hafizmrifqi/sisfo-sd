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
        Schema::create('mapels', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mapel')->unique()->nullable(); // Opsional
            $table->string('nama_mapel'); // Contoh: "Matematika", "Bahasa Indonesia"
            $table->text('deskripsi')->nullable();
            $table->enum('tingkat', ['1', '2', '3', '4', '5', '6'])->default('1'); // Tingkat SD
            $table->foreignId('guru_id')->nullable()->constrained('gurus')->onDelete('set null'); // Relasi ke guru
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapels');
    }
};
