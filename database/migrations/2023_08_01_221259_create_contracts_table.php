<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->date('admision_date')->comment('Fecha Inicio contrato');
            $table->date('final_date')->nullable()->comment('Fecha Fin contrato');   
            $table->unsignedBigInteger('employee_id')->comment('Relacion con el empleado');
            $table->unsignedBigInteger('contract_type_id')->comment('Relacion con el tipo de contrato');
            $table->unsignedBigInteger('bank_id')->comment('Relacion con el banco');
            $table->unsignedBigInteger('box_id')->comment('Relacion con el caja');
            $table->unsignedBigInteger('created_user_id')->comment('Usuario que creo el contrato');
            $table->decimal('salary', 10, 2)->comment('Salario');
            $table->string('bank_account_number')->nullable()->comment('Cuenta bancaria');
            $table->string('transport_assistant')->comment('Transporte');
            $table->string('payment_period')->comment('Periodo de pago');
            $table->boolean('active')->default(true)->comment('Estado del contrato (activo o finalizado)');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('contract_type_id')->references('id')->on('contract_types')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('cascade');
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
        Schema::dropIfExists('contracts');
    }
}
