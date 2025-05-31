<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;

class GuruExport implements FromCollection
{
    public function collection()
    {
        return Guru::all();
    }
}
