<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeyToPengiriman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengiriman', function (Blueprint $table) {
            $table->foreign('karyawan_id')->references('id')->on('karyawan');
            $table->foreign('jenisKirim_id')->references('id')->on('jenis_pengiriman');
            $table->foreign('transaksi_id')->references('id')->on('transaksi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengiriman', function (Blueprint $table) {
            $table->dropForeign('pembayaran_karyawan_id_foreign');
            $table->dropForeign('pembayaran_metode_id_foreign');
        });
    }
}
