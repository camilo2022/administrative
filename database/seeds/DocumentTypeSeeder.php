<?php

use App\DocumentType;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocumentType::create([ "name" => "SI", "description" => "SIN IDENTIFICACION"]);
        DocumentType::create([ "name" => "TI", "description" => "TARJETA DE INDENTIDAD"]);
        DocumentType::create([ "name" => "CC", "description" => "CEDULA DE CIUDADANIA"]);
        DocumentType::create([ "name" => "CE", "description" => "CEDULA DE EXTRANJERIA"]);
        DocumentType::create([ "name" => "NIT", "description" => "NUMERO DE INDENTIFICACIÓN TRIBUTARIA"]);
        DocumentType::create([ "name" => "PEP", "description" => "PERMISO ESPECIAL DE PERMANENCIA"]);
        DocumentType::create([ "name" => "PPT", "description" => "PERMISO POR PROTECCION TEMPORAL"]);
    }
}
