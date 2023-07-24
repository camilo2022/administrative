<?php

use App\Departament;
use Illuminate\Database\Seeder;

class DepartamentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departament::create([ "id_country"=>1, "name"=>'-']);
        Departament::create([ "id_country"=>2, "name"=>'AMAZONAS']);
        Departament::create([ "id_country"=>2, "name"=>'ANTIOQUIA']);
        Departament::create([ "id_country"=>2, "name"=>'ARAUCA']);
        Departament::create([ "id_country"=>2, "name"=>'ATLANTICO']);
        Departament::create([ "id_country"=>2, "name"=>'BOLIVAR']);
        Departament::create([ "id_country"=>2, "name"=>'BOYACA']);
        Departament::create([ "id_country"=>2, "name"=>'CALDAS']);
        Departament::create([ "id_country"=>2, "name"=>'CAQUETA']);
        Departament::create([ "id_country"=>2, "name"=>'CASANARE']);
        Departament::create([ "id_country"=>2, "name"=>'CAUCA']);
        Departament::create([ "id_country"=>2, "name"=>'CESAR']);
        Departament::create([ "id_country"=>2, "name"=>'CHOCO']);
        Departament::create([ "id_country"=>2, "name"=>'CORDOBA']);
        Departament::create([ "id_country"=>2, "name"=>'CUNDINAMARCA']);
        Departament::create([ "id_country"=>2, "name"=>'GUAINIA']);
        Departament::create([ "id_country"=>2, "name"=>'GUAVIARE']);
        Departament::create([ "id_country"=>2, "name"=>'HUILA']);
        Departament::create([ "id_country"=>2, "name"=>'LA GUAJIRA']);
        Departament::create([ "id_country"=>2, "name"=>'MAGDALENA']);
        Departament::create([ "id_country"=>2, "name"=>'META']);
        Departament::create([ "id_country"=>2, "name"=>'NARIÑO']);
        Departament::create([ "id_country"=>2, "name"=>'NORTE DE SANTANDER']);
        Departament::create([ "id_country"=>2, "name"=>'PUTUMAYO']);
        Departament::create([ "id_country"=>2, "name"=>'QUINDIO']);
        Departament::create([ "id_country"=>2, "name"=>'RISARALDA']);
        Departament::create([ "id_country"=>2, "name"=>'SAN ANDRES Y PROVIDENCIA']);
        Departament::create([ "id_country"=>2, "name"=>'SANTANDER']);
        Departament::create([ "id_country"=>2, "name"=>'SUCRE']);
        Departament::create([ "id_country"=>2, "name"=>'TOLIMA']);
        Departament::create([ "id_country"=>2, "name"=>'VALLE DEL CAUCA']);
        Departament::create([ "id_country"=>2, "name"=>'VAUPES']);
        Departament::create([ "id_country"=>2, "name"=>'VICHADA']);

    }
}
