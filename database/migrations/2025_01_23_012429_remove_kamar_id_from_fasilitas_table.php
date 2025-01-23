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
        Schema::table('fasilitas', function (Blueprint $table) {
            $table->dropForeign(['kamar_id']); // Hapus foreign key jika ada
            $table->dropColumn('kamar_id');    // Hapus kolom kamar_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fasilitas', function (Blueprint $table) {
            $table->unsignedBigInteger('kamar_id')->nullable(); // Tambahkan kembali kolom kamar_id
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade'); // Tambahkan kembali foreign key
        });
    }
};