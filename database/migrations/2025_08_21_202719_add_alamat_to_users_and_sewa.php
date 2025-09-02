<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tambahin alamat default di tabel users
        Schema::table('users', function (Blueprint $table) {
            $table->string('alamat')->nullable()->after('no_telp');
        });

        // Tambahin alamat transaksi di tabel sewa
        Schema::table('sewa', function (Blueprint $table) {
            $table->string('alamat_pengiriman')->nullable()->after('id_user');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('alamat');
        });

        Schema::table('sewa', function (Blueprint $table) {
            $table->dropColumn('alamat_pengiriman');
        });
    }
};