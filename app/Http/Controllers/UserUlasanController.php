<?php

namespace App\Http\Controllers;

use App\Models\UserUlasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserUlasanController extends Controller
{
    public function store(Request $request, $id_produk)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'komentar' => 'required|string|max:1000',
        ]);

        UserUlasan::create([
            'id_user' => Auth::id(),
            'id_produk' => $id_produk,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
            'tanggal' => now(),
        ]);

        return redirect()->back()->with('success', 'Ulasan berhasil dikirim.');
    }
}
