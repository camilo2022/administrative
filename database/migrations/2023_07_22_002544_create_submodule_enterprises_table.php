<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSubModuleEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submodules_enterprises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('submodules_id')->comment('Id del submodulo');
            $table->foreign('submodules_id')->references('id')->on('submodules');
            $table->unsignedBigInteger('enterprises_id')->comment('Id de la empresa');
            $table->foreign('enterprises_id')->references('id')->on('enterprises');
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
        Schema::dropIfExists('submodules_enterprises');
    }
}
