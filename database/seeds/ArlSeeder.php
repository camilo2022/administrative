<?php

use App\Arl;
use Illuminate\Database\Seeder;

class ArlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Arl::create(["name" => "ARL POSITIVA"]);
        Arl::create(["name" => "SEGUROS BOLÍVAR S.A"]);
        Arl::create(["name" => "SEGUROS DE VIDA AURORA S.A"]);
        Arl::create(["name" => "LIBERTY SEGUROS DE VIDA"]);
        Arl::create(["name" => "MAPFRE COLOMBIA VIDA SEGUROS S.A."]);
        Arl::create(["name" => "RIESGOS LABORALES COLMENA"]);
        Arl::create(["name" => "SEGUROS DE VIDA ALFA S.A"]);
        Arl::create(["name" => "SEGUROS DE VIDA COLPATRIA S.A"]);
        Arl::create(["name" => "SEGUROS DE VIDA LA EQUIDAD ORGANISMO C."]);
        Arl::create(["name" => "SURA - CIA. SURAMERICANA DE SEGUROS DE VIDA"]);
    }
}
