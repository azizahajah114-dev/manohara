<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailSewa extends Model
{
    use HasFactory;

    protected $table = 'detail_sewa';
    protected $fillable = [
        'id_sewa',
        'id_produk',
        'id_variasi',
        'jumlah',
        'harga',
    ];

    public function sewa()
    {
        return $this->belongsTo(Sewa::class, 'id_sewa');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function variasi()
    {
        return $this->belongsTo(VariasiProduk::class, 'id_variasi');
    }
}
