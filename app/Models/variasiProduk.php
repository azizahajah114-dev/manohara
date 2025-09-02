<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariasiProduk extends Model
{
    protected $table = 'variasi_produk';
    protected $fillable = [
        'id_produk', 'warna', 'ukuran', 'stok'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
    
}
