<?php

use Illuminate\Database\Seeder;
use App\Module;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Module::create([ 'name_modules' => 'Administracion', 'icon_modules' => 'zmdi zmdi-settings']);

    }
}
