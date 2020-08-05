<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterModuleRelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_module_rels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kode_master_module')->constrained('master_modules');
            $table->foreignId('kode_master_menu')->constrained('master_menus');
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
        Schema::dropIfExists('master_module_rels');
    }
}
