<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProdukBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_barang', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('nama_barang');
            $table->string('merk_barang');
            $table->string('deskripsi_barang');
            $table->integer('berat');
            $table->enum('satuan', ['Gram', 'Kilo'])->comment('Gram, Kilo');
            $table->float('harga');
            $table->integer('stok');
            $table->unsignedInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori_barang');
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
        Schema::dropIfExists('produk_barang');
    }
}
