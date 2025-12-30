<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $fillable = [
        'nama_kurikulum', 
        'versi', 
        'struktur'
    ];

    protected $casts = [
        'struktur' => 'array',
    ];
}
