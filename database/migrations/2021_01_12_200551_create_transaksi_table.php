<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('perincian');
            $table->integer('jumlah');
            $table->enum('kategori',['pemasukan','pengeluaran']);
            $table->date('tanggal');
            $table->unsignedMediumInteger('saldo_id')->unique();
            $table->foreign('saldo_id')->references('id')->on('saldo');
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
