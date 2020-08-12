<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataKuliahRelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_kuliah_rels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kode_kartu_studi')->constrained('kartu_studis');
            $table->foreignId('kode_mata_kuliah')->constrained('master_mata_kuliahs');
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
        Schema::dropIfExists('mata_kuliah_rels');
    }
}
