<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $fillable = [
        'kode_mapel', 'nama_mapel', 'deskripsi', 'tingkat', 'guru_id', 'kkm', 'kurikulum_id'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }

    public function kompetensis()
    {
        return $this->hasMany(Kompetensi::class);
    }
}
