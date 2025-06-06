<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'nama_kelas', 'tingkat', 'wali_kelas_id', 'tahun_ajaran',
    ];

    public function walas()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas_id');
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'anggota_kelas')->withTimestamps();
    }
}
