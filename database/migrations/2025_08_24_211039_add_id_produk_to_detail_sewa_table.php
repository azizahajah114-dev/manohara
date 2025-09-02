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
        Schema::table('detail_sewa', function (Blueprint $table) {
            $table->unsignedBigInteger('id_produk')->after('id');
            $table->foreign('id_produk')->references('id')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_sewa', function (Blueprint $table) {
            $table->dropForeign(['id_produk']);
            $table->dropColumn('id_produk');
        });
    }
};
