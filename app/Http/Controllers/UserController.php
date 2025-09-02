<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // tampilkan daftar user
    public function index()
    {
        $users = User::all();
        return view('admin.pengguna.user', compact('users'));
        
    }

    // detail user
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pengguna.user_detail', compact('user'));
    }
}
