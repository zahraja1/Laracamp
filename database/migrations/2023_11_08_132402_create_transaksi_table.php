<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('peserta_id');
            $table->integer('bootcamp_id');
            $table->string('kode_transaksi')->nullable();
            $table->string('nama');
            $table->string('email');
            $table->string('pekerjaan');
            $table->string('rekening');
            $table->string('expired');
            $table->string('cvc');
            $table->string('status')->default(2);
            // status transakasi
            // 1 = Transaksi sukses
            // 2 = Menunggu Pembayaran
            // 3 = Transaksi Gagal
            $table->string('total_harga')->nullable();
            $table->string('kode_unik')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
