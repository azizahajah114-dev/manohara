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
        Schema::create('variasi_produk', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_produk')->constrained('produk')->onDelete('cascade');
        $table->string('warna')->nullable();
        $table->string('ukuran')->nullable();
        $table->integer('stok')->default(0);
        $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variasi_produk');
    }
};
