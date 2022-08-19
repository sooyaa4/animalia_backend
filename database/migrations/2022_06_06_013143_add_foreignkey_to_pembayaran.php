<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeyToPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->foreign('transaksi_id')->references('id')->on('transaksi');
            $table->foreign('karyawan_id')->references('id')->on('karyawan');
            $table->foreign('metode_id')->references('id')->on('metode_bayar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropForeign('pembayaran_karyawan_id_foreign');
            $table->dropForeign('pembayaran_metode_id_foreign');
        });
    }
}
