<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'nama_kelas', 'walas_id', 'tahun_ajaran', 'jumlah_siswa', 'deskripsi'
    ];
}
