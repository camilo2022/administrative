<?php

use App\Rank;
use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rank::create(["name" => "ALTA GERENCIA"]);
        Rank::create(["name" => "GERENCIA INTERMEDIA"]);
        Rank::create(["name" => "JEFE INMEDIATO"]);
        Rank::create(["name" => "PERSONAL OPERATIVO"]);
    }
}
