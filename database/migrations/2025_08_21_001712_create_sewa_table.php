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
       Schema::create('sewa', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_user')->constrained('users')->cascadeOnDelete();
        $table->date('tgl_sewa');
        $table->date('tgl_kembali');
        $table->integer('durasi_sewa');
        $table->decimal('total_harga', 12, 2); // simpan total transaksi
        $table->decimal('ongkir', 12, 2)->default(0);
        $table->string('bukti_pembayaran')->nullable();
        $table->enum('status_sewa', ['menunggu','dibayar','diproses','selesai','dibatalkan'])->default('menunggu');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewa');
    }
};
