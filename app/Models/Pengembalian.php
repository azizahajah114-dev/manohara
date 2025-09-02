<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';
    protected $fillable = [
        'id_sewa',
        'tgl_pengembalian',
        'bukti_pengembalian'
    ];

    public function sewa()
    {
        return $this->belongsTo(Sewa::class, 'id_sewa');
    }
}
