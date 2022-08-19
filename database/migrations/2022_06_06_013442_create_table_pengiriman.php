<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateTablePengiriman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->enum('status', ['Paket proses kirim', 'Paket di kirim', 'Paket di terima'])->comment('Paket proses kirim , Paket di kirim,  Paket di terima');
            $table->string('noresi')->nullable();
            $table->unsignedInteger('transaksi_id');
            $table->unsignedInteger('jenisKirim_id');
            $table->unsignedInteger('karyawan_id')->nullable();
            $table->date('tanggal_kirim')->nullable();
            $table->date('tanggal_terima')->nullable();
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
        Schema::dropIfExists('pengiriman');
    }
}
