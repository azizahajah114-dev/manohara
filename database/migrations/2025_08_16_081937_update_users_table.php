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
        Schema::table('users', function (Blueprint $table) {
            // hapus kolom email_verified_at
            $table->dropColumn('email_verified_at');

            // tambah kolom baru
            $table->string('no_telp')->after('email');
            $table->string('up_ktp')->nullable()->after('no_telp');
            $table->string('role')->default('user')->after('up_ktp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // rollback perubahan
            $table->timestamp('email_verified_at')->nullable();
            $table->dropColumn(['no_telp', 'up_ktp', 'role']);
        });
    }
};
