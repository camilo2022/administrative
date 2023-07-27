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

        Module::create([ 'name_modules' => 'Configuracion', 'icon_modules' => 'zmdi zmdi-settings']);
        Module::create([ 'name_modules' => 'Division Politica', 'icon_modules' => 'zmdi zmdi-apps']);
        Module::create([ 'name_modules' => 'Administracion', 'icon_modules' => 'zmdi zmdi-folder']);
        Module::create([ 'name_modules' => 'Talento Humano', 'icon_modules' => 'zmdi zmdi-male-female']);
        Module::create([ 'name_modules' => 'Logistica', 'icon_modules' => 'zmdi zmdi-shopping-cart']);
        Module::create([ 'name_modules' => 'Contabilidad', 'icon_modules' => 'zmdi zmdi-money']);
        Module::create([ 'name_modules' => 'Reportes', 'icon_modules' => 'zmdi zmdi-assignment']);
    }
}
