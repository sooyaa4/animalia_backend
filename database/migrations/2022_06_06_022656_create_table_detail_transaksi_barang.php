<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailTransaksiBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi_barang', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->bigInteger('jumlah_pesan');
            $table->unsignedInteger('produk_id');
            $table->unsignedInteger('transaksi_id');
            $table->foreign('produk_id')->references('id')->on('produk_barang');
            $table->foreign('transaksi_id')->references('id')->on('transaksi');
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
        Schema::dropIfExists('detail_transaksi_barang');
    }
}
