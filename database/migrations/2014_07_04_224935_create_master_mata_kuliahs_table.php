<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterMataKuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_mata_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mata_kuliah')->unique();
            $table->string('nama_mata_kuliah');
            $table->foreignId('kode_status_mata_kuliah')->constrained('master_jenis_mata_kuliahs');
            $table->integer('penanggung_jawab_nindn');
            $table->foreignId('kode_jurusan')->constrained('master_jurusans');
            $table->foreignId('kode_tahun_ajaran')->constrained('master_tahun_ajarans');
            $table->integer('semester_mata_kuliah')->index();
            $table->timestamps();
        });

        Schema::table('master_mata_kuliahs', function (Blueprint $table) {
            $table->foreign('penanggung_jawab_nindn')->references('nindn')->on('master_dosens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_mata_kuliahs');
    }
}
