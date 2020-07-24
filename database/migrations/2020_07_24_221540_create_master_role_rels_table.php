<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterRoleRelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_role_rels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kode_master_role')->constrained('master_roles');
            $table->foreignId('kode_master_menu')->constrained('master_menus');
            $table->foreignId('kode_user')->constrained('users');
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
        Schema::dropIfExists('master_role_rels');
    }
}
