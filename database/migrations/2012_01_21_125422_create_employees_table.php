<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->id()->comment('Consecutivo empleado');
            $table->string('civil_state',30)->nullable()->comment('Estado civil')->default('-');
            $table->string('date_of_birth')->nullable()->comment('Fecha de nacimiento');
            $table->string('date_of_expedition')->nullable()->comment('Fecha de expedicon del documento');
            $table->string('arl_rate')->nullable()->comment('tarifa arl');
            $table->string('affiliation_date_eps')->nullable()->comment('fecha afiliacion eps');
            $table->string('affiliation_date_arl')->nullable()->comment('fecha afiliacion arl');
            $table->string('photography')->nullable()->comment('fotografia del empleado');
            $table->unsignedBigInteger('person_id')->comment('Codigo persona relacion');
            $table->unsignedBigInteger('post_id')->comment('Codigo Cargo relacion');
            $table->unsignedBigInteger('rank_id')->comment('Codigo Rango de autoridad relacion');
            $table->unsignedBigInteger('arl_id')->comment('Codigo Arl relacion');
            $table->unsignedBigInteger('eps_id')->comment('Codigo Epsrelacion');
            $table->unsignedBigInteger('pension_id')->comment('Codigo pension relacion');
            $table->unsignedBigInteger('enterprise_id')->comment('Codigo empresa relacion');
            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('cascade');
            $table->foreign('arl_id')->references('id')->on('arls')->onDelete('cascade');
            $table->foreign('eps_id')->references('id')->on('eps')->onDelete('cascade');
            $table->foreign('pension_id')->references('id')->on('pensions')->onDelete('cascade');
            $table->foreign('enterprise_id')->references('id')->on('enterprises')->onDelete('cascade');
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
        Schema::dropIfExists('employees');
    }
}
