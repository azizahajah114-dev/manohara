<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\FotoProduk;
use App\Models\UserUlasan;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'id_kategori',
        'deskripsi',
        'harga',
        'foto',
        'best_seller',
    ];

    // Produk belongsTo Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id');
    }

    //relasi ke variasi
     public function variasi()
    {
        return $this->hasMany(VariasiProduk::class, 'id_produk');
    }

    public function ulasan(): HasMany
    {
        return $this->hasMany(UserUlasan::class, 'id_produk');
    }
}
