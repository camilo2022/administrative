<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRolSubModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_submodules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rol')->comment('Id del rol al que pertenece');
            $table->foreign('id_rol')->references('id')->on('roles');
            $table->unsignedBigInteger('id_submodule')->comment('Id del submodulo al que pertence');
            $table->foreign('id_submodule')->references('id')->on('submodules');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Fecha/Hora creacion registro');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('Fecha/Hora actualizacion registro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_submodules');
    }
}
