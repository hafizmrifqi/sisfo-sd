<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SIAD Sekolah | SDIT Arofatul Ulum',
        ];

        return view('index', $data);
    }
}
