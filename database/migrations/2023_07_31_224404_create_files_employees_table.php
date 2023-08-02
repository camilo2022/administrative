<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFilesEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files_employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre del archivo');
            $table->string('route')->comment('Ruta del archivo');
            $table->unsignedBigInteger('employee_id')->comment('Codigo empresa relacion');
            $table->foreign('employee_id')->references('id')->on('employees');
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
        Schema::dropIfExists('files_employees');
    }
}
