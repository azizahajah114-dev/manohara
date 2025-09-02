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
        Schema::create('detail_sewa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sewa')->constrained('sewa')->cascadeOnDelete();
            $table->foreignId('id_variasi')->constrained('variasi_produk')->cascadeOnDelete();
            $table->integer('jumlah');
            $table->decimal('harga', 12, 2); // harga transaksi (snapshot)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_sewa');
    }
};
