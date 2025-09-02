<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailSewa;


class Sewa extends Model
{
    use HasFactory;

    protected $table = 'sewa';
    protected $fillable = [
        'id_user',
        'alamat_pengiriman',
        'tgl_sewa',
        'tgl_kembali',
        'durasi_sewa',
        'ongkir',
        'bukti_pembayaran',
        'biaya_barang',
        'total_harga',
        'status_sewa',
        'catatan_penolakan',
    ];

    public function detailSewa()
    {
        return $this->hasMany(DetailSewa::class, 'id_sewa');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'id_sewa');
    }
}
