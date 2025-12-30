<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'siswa_id', 'mapel_id', 'nilai', 'jenis', 'semester', 'tahun_ajaran', 'kelas_id', 'kompetensi_id'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function kompetensi()
    {
        return $this->belongsTo(Kompetensi::class);
    }

}
