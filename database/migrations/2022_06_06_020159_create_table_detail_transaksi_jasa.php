<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailTransaksiJasa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi_jasa', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->bigInteger('jumlah_pesan_jasa');
            $table->unsignedInteger('layanan_id');
            $table->unsignedInteger('jasa_id');
            $table->unsignedInteger('transaksi_id');
            $table->timestamps();
            $table->foreign('transaksi_id')->references('id')->on('transaksi');
            $table->foreign('jasa_id')->references('id')->on('jasa');
            $table->foreign('layanan_id')->references('id')->on('layanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksi_jasa');
    }
}
