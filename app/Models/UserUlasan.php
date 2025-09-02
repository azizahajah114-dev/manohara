<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserUlasan extends Model
{
    protected $table = 'ulasan';
    protected $fillable = ['id_user', 'id_produk', 'rating', 'komentar', 'tanggal'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
