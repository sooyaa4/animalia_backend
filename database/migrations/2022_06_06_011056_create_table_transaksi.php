<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('alamat');
            $table->enum('status', ['Pending', 'Pesanan di proses', 'Selesai', 'Di batalkan'])->comment('Pending, Pesanan di proses, Selesai, Di batalkan');
            $table->enum('jenis', ['Barang', 'Treatment'])->comment('Barang, Treatment');
            $table->float('total_harga');
            $table->float('subtotal');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('karyawan_id')->nullable();
            $table->date('tanggal_pembelian');
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
}
