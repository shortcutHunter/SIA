<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_nilais', function (Blueprint $table) {
            $table->id();
            $table->integer('nim_mahasiswa');
            $table->string('kode_mata_kuliah');
            $table->string('keterangan');
            $table->integer('bobot');
            $table->integer('nilai');
            $table->timestamps();
        });

        Schema::table('transaksi_nilais', function (Blueprint $table) {
            $table->foreign('nim_mahasiswa')->references('nim')->on('mahasiswas');
            $table->foreign('kode_mata_kuliah')->references('kode_mata_kuliah')->on('master_mata_kuliahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_nilais');
    }
}
