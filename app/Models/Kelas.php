<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'nama_kelas', 'walas_id', 'tahun_ajaran',
    ];

    public function walas()
    {
        return $this->belongsTo(Guru::class, 'walas_id');
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'anggota_kelas')
                    ->withPivot('status')
                    ->withTimestamps();
    }
}
