<?php

use App\Eps;
use Illuminate\Database\Seeder;

class EpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eps::create(["name" => "COOSALUD EPS-S"]);     
        Eps::create(["name" => "NUEVA EPS"]); 
        Eps::create(["name" => "ALIANSALUD EPS"]); 
        Eps::create(["name" => "MUTUAL SER"]); 
        Eps::create(["name" => "SALUD TOTAL EPS S.A."]); 
        Eps::create(["name" => "EPS SANITAS"]); 
        Eps::create(["name" => "EPS SURA"]); 
        Eps::create(["name" => "FAMISANAR"]); 
        Eps::create(["name" => "SERVICIO OCCIDENTAL DE SALUD EPS SOS"]); 
        Eps::create(["name" => "SALUD MIA"]); 
        Eps::create(["name" => "COMFENALCO VALLE EPS012 EPSS12 890303093 CONTRIBUTIVO"]); 
        Eps::create(["name" => "COMPENSAR EPS EPS008 EPSS08 860066942 CONTRIBUTIVO"]); 
        Eps::create(["name" => "EPM"]); 
        Eps::create(["name" => "FONDO DE PASIVO SOCIAL DE FERROCARRILES NACIONALES DE COLOMBIA"]); 
        Eps::create(["name" => "CAJACOPI ATLANTICO "]); 
        Eps::create(["name" => "CAPRESOCA"]); 
        Eps::create(["name" => "COMFACHOCO"]); 
        Eps::create(["name" => "COMFAORIENTE"]); 
        Eps::create(["name" => "EPS FAMILIAR DE COLOMBIA"]); 
        Eps::create(["name" => "ASMET SALUD ESS062"]); 
        Eps::create(["name" => "ECOOPSOS ESS EPS-S"]); 
        Eps::create(["name" => "EMSSANAR E.S.S."]); 
        Eps::create(["name" => "CAPITAL SALUD EPS-S"]); 
        Eps::create(["name" => "SAVIA SALUD EPS"]); 
        Eps::create(["name" => "DUSAKAWI EPSI"]); 
        Eps::create(["name" => "ASOCIACION INDIGENA DEL CAUCA EPSI"]); 
        Eps::create(["name" => "ANAS WAYUU EPSI"]); 
        Eps::create(["name" => "MALLAMAS EPSI"]); 
        Eps::create(["name" => "PIJAOS SALUD EPSI"]); 
        Eps::create(["name" => "SALUD BÓLIVAR"]); 
    }
}
