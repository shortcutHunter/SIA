<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mata_kuliah');
            $table->time('waktu');
            $table->string('hari');
            $table->string('kode_ruangan');
            $table->timestamps();
        });

        Schema::table('jadwal_kuliahs', function (Blueprint $table) {
            $table->foreign('kode_mata_kuliah')->references('kode_mata_kuliah')->on('master_mata_kuliahs');
            $table->foreign('kode_ruangan')->references('kode_ruangan')->on('master_ruangans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_kuliahs');
    }
}
