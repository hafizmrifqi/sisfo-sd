<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SIAD Sekolah | SDIT Arofatul Ulum',
            'siswa' => Siswa::count(),
            'guru' => Guru::count(),
        ];

        return view('index', $data);
    }
}
