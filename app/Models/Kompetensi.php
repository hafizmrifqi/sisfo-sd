<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
    protected $fillable = [
        'kode_kompetensi', 
        'nama_kompetensi', 
        'deskripsi', 
        'mapel_id'
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
