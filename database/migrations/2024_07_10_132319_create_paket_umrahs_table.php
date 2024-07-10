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
        Schema::create('paket_umrahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->string('durasi_umrah');
            $table->foreignId('id_hotel_mekah')->references('id')->on('hotel_mekahs');
            $table->foreignId('id_hotel_madinah')->references('id')->on('hotel_madinahs');
            $table->string('bonus_paket');
            $table->foreignId('id_jenis_pesawat')->references('id')->on('pesawats');
            $table->string('bandara_keberangkatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_umrahs');
    }
};
