<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class FotoProduk extends Model
{
    use HasFactory;

    protected $table = 'foto_produk'; // sesuai migration

    protected $fillable = ['produk_id', 'foto_produk'];

    // Foto belongsTo Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
