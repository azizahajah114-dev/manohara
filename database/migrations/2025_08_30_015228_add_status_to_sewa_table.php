<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sewa', function (Blueprint $table) {
            $table->enum('status_sewa', [
                'menunggu',
                'dibayar',
                'diproses',
                'disewa',
                'selesai',
                'dibatalkan',
                'ditolak',
                'proses_pengembalian'
            ])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sewa', function (Blueprint $table) {
            $table->enum('status_sewa', [
                'menunggu',
                'dibayar',
                'diproses',
                'disewa',
                'selesai',
                'dibatalkan',
                'ditolak',
                'proses_pengembalian'
            ])->change();
        });
    }
};
