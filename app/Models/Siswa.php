<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nipd', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'nama_ayah', 'nama_ibu'
    ];
}
