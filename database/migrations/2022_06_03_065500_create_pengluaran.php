<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengluaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengluaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('siswa_id');
            $table->integer('kelas_id');
            $table->integer('guru_id');
            $table->integer('mapel_id');
            $table->string('jumlah');
            $table->string('keterangan');
            $table->string('tanggal');
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
        Schema::dropIfExists('pengluaran');
    }
}
