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
       Schema::create('pembayaran_services', function (Blueprint $table) {
            $table->id();
            $table->string('id_servis_pelanggan');
            $table->integer('jumlah_biaya_servis');
            $table->enum('jenis_pembayaran', ['Cash / Tunai', 'Non Tunai']);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_servis_pelanggan')->references('id_servis_pelanggan')->on('daftar_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_services');
    }
};
