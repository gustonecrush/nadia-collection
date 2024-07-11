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
        Schema::create('hasil_produksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('harga');
            $table->string('tanggal_produksi');
            $table->string('stok');
            $table->foreignId('id_admin')->constrained('admins', 'id');
            $table->string('file_foto_produk');
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
