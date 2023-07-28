<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id()->comment('Consecutivo de registro');
            $table->string('name',255)->comment('Nombre');
            $table->string('lastname',35)->comment('Apellido')->nullable();
            $table->unsignedBigInteger('document_type_id')->comment('Tipo Documento');
            $table->string('document_number',20)->comment('Numero de Documento');
            $table->string('telephone',255)->comment('Telefono');
            $table->string('email',55)->comment('Correo Electronico');
            $table->string('sex',20)->comment('Sexo')->default('-');
            $table->string('address',15000)->comment('Direccion')->default('-');
            $table->string('neighborhood',40)->comment('Barrio')->default('-')->nullable();
            $table->string('type_blood',65)->comment('Tipo de sangre')->default('-');
            $table->unsignedBigInteger('eps_id')->nullable()->comment('Id de la eps');
            $table->unsignedBigInteger('arl_id')->nullable()->comment('Id de la arl');
            $table->unsignedBigInteger('city_id')->comment('Id de Ciudad');
            $table->foreign('document_type_id')->references('id')->on('document_types');
            $table->foreign('city_id')->references('id')->on('citys');
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
        Schema::dropIfExists('persons');
    }
}
