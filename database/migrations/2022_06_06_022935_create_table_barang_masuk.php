<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBarangMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('stok_masuk');
            $table->date('tanggal_masuk');
            $table->float('total_harga');
            $table->unsignedInteger('produk_id');
            $table->unsignedInteger('karyawan_id')->nullable();
            $table->foreign('produk_id')->references('id')->on('produk_barang');
            $table->foreign('karyawan_id')->references('id')->on('karyawan');
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
        Schema::dropIfExists('barang_masuk');
    }
}
