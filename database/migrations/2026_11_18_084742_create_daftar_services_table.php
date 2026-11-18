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
       Schema::create('daftar_services', function (Blueprint $table) {
            $table->string('id_servis_pelanggan')->primary();
            $table->string('no_plat_kendaraan');
            $table->string('id_pelanggan');
            $table->text('keluhan_kendaraan');
            $table->date('tanggal_servis');
            $table->timestamps();

            $table->foreign('no_plat_kendaraan')->references('no_plat_kendaraan')->on('kendaraans')->onDelete('cascade');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_services');
    }
};
