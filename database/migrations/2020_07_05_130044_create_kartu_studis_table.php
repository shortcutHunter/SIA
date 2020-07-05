<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuStudisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_studis', function (Blueprint $table) {
            $table->id();
            $table->integer('nim_mahasiswa');
            $table->integer('semester_mata_kuliah');
            $table->timestamps();
        });

        Schema::table('kartu_studis', function (Blueprint $table) {
            $table->foreign('nim_mahasiswa')->references('nim')->on('mahasiswas');
            $table->foreign('semester_mata_kuliah')->references('semester_mata_kuliah')->on('master_mata_kuliahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kartu_studis');
    }
}
