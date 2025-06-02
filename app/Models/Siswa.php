<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nipd', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'nama_ayah', 'nama_ibu'
    ];

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'anggota_kelas')->withTimestamps();
    }
}
