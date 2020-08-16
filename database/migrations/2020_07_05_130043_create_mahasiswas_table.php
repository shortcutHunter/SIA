<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->integer('nim')->unique();
            $table->string('nama_mahasiswa');
            $table->foreignId('kode_jurusan')->constrained('master_jurusans');
            $table->foreignId('kode_tahun_ajaran')->constrained('master_tahun_ajarans');
            $table->integer('semester_mata_kuliah');
            $table->enum('jenis_kelamin', ['laki_laki','perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('no_hp');
            $table->string('email');
            $table->string('alamat_tempat_tinggal');
            $table->enum('status', ['active', 'cuti', 'tidak_active']);
            $table->foreignId('kode_agama')->constrained('master_agamas');
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
        Schema::dropIfExists('mahasiswas');
    }
}
