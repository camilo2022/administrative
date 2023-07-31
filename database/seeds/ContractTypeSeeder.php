<?php

use App\ContractType;
use Illuminate\Database\Seeder;

class ContractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContractType::create(["name" => "-", "description" => "-"]);
        ContractType::create(["name" => "CONTRATO DE TRABAJO FIJO O CONTRATO A TÉRMINO FIJO", "description" => "CONTRATO DE TRABAJO FIJO O CONTRATO A TÉRMINO FIJO"]);
        ContractType::create(["name" => "CONTRATO DE TRABAJO INDEFINIDO O CONTRATO A TÉRMINO INDEFINIDO", "description" => "CONTRATO DE TRABAJO INDEFINIDO O CONTRATO A TÉRMINO INDEFINIDO"]);
        ContractType::create(["name" => "CONTRATO POR OBRA O SERVICIO DETERMINADO", "description" => "CONTRATO POR OBRA O SERVICIO DETERMINADO"]);
        ContractType::create(["name" => "CONTRATO DE TEMPORADA", "description" => "CONTRATO DE TEMPORADA"]);
        ContractType::create(["name" => "CONTRATO DE APRENDIZAJE", "description" => "CONTRATO DE APRENDIZAJE"]);
        ContractType::create(["name" => "CONTRATO DE TIEMPO PARCIAL", "description" => "CONTRATO DE TIEMPO PARCIAL"]);
        ContractType::create(["name" => "CONTRATO POR REEMPLAZO", "description" => "CONTRATO POR REEMPLAZO"]);
        ContractType::create(["name" => "CONTRATO DE TELETRABAJO", "description" => "CONTRATO DE TELETRABAJO"]);
        ContractType::create(["name" => "CONTRATO POR PRUEBA O PERÍODO DE PRUEBA", "description" => "CONTRATO POR PRUEBA O PERÍODO DE PRUEBA"]);
        ContractType::create(["name" => "CONTRATO DE SERVICIOS PROFESIONALES", "description" => "CONTRATO DE SERVICIOS PROFESIONALES"]);
        ContractType::create(["name" => "CONTRATO DE CERO HORAS", "description" => "CONTRATO DE CERO HORAS"]);
        ContractType::create(["name" => "CONTRATO DE TRABAJO POR TURNOS", "description" => "CONTRATO DE TRABAJO POR TURNOS"]);
        ContractType::create(["name" => "CONTRATO DE OBRA LABOR O CONTRATO POR TIEMPO DE SERVICIOS", "description" => "CONTRATO DE OBRA LABOR O CONTRATO POR TIEMPO DE SERVICIOS"]);
        ContractType::create(["name" => "CONTRATO DE INTERINIDAD", "description" => "CONTRATO DE INTERINIDAD"]);
        ContractType::create(["name" => "CONTRATO DE FORMACIÓN Y APRENDIZAJE", "description" => "CONTRATO DE FORMACIÓN Y APRENDIZAJE"]);
        ContractType::create(["name" => "CONTRATO DE TRABAJO EVENTUAL POR CIRCUNSTANCIAS DE LA PRODUCCIÓN", "description" => "CONTRATO DE TRABAJO EVENTUAL POR CIRCUNSTANCIAS DE LA PRODUCCIÓN"]);
        ContractType::create(["name" => "CONTRATO DE TRABAJO DE MENORES DE EDAD", "description" => "CONTRATO DE TRABAJO DE MENORES DE EDAD"]);
        ContractType::create(["name" => "CONTRATO DE TRABAJO A DOMICILIO", "description" => "CONTRATO DE TRABAJO A DOMICILIO"]);
        ContractType::create(["name" => "CONTRATO DE GRUPO O EQUIPO DE TRABAJO", "description" => "CONTRATO DE GRUPO O EQUIPO DE TRABAJO"]);
        ContractType::create(["name" => "CONTRATO DE PRÁCTICAS", "description" => "CONTRATO DE PRÁCTICAS"]);
    }
}
