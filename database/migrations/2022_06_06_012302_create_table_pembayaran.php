<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->enum('status', ['Pembayaran di cek', 'Pembayaran Gagal', 'Pembayaran di terima'])->comment('Pembayaran di cek, Pembayaran Gagal , Pembayaran di terima');
            $table->string('url')->nullable();
            $table->string('revisi')->nullable();
            $table->unsignedInteger('metode_id');
            $table->unsignedInteger('transaksi_id');
            $table->unsignedInteger('karyawan_id')->nullable();
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
        Schema::dropIfExists('pembayaran');
    }
}
