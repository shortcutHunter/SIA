<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_dosens', function (Blueprint $table) {
            $table->id();
            $table->integer('nip')->unique();
            $table->integer('nindn')->unique();
            $table->string('nama_dosen');
            $table->string('gelar');
            $table->enum('jenis_kelamin', ['laki_laki','perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->foreignId('kode_agama')->constrained('master_agamas');
            $table->integer('no_hp');
            $table->string('email');
            $table->integer('no_ktp');
            $table->string('alamat_tempat_tinggal');
            $table->date('mulai_bekerja');
            $table->foreignId('kode_status_dosen')->constrained('master_status_dosens');
            $table->foreignId('kode_status_kerja_dosen')->constrained('master_status_kerja_dosens');
            $table->foreignId('kode_pendidikan_tertinggi')->constrained('master_status_pendidikans');
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
        Schema::dropIfExists('master_dosens');
    }
}
