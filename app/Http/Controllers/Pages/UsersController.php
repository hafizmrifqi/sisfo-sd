<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('q')) {
            $users = User::where('name', 'like', "%{$request->q}%")
                ->orWhere('email', 'like', "%{$request->q}%")
                ->paginate(10);
        }
        else {
            $users = User::paginate(10);
        }

        $data = [
            'title' => 'Data Users',
            'users' => $users,
        ];

        return view('pages.users.index', $data);
    }
    
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Users',
        ];

        return view('pages.users.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Data users berhasil ditambahkan.');
    }
}
