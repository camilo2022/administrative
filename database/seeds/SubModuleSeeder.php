<?php

use Illuminate\Database\Seeder;
use App\Submodule;

class SubModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Submodule::create([
            "name_submodules" => "Registro de usuarios",
            "id_module" => 1,
            "route" => "/Dashboard/User/Index"
        ]);
        Submodule::create([
            "name_submodules" => "Usuarios inactivos",
            "id_module" => 1,
            "route" => "/Dashboard/User/Index/Inactivos"
        ]);
        Submodule::create([
            "name_submodules" => "Roles",
            "id_module" => 1,
            "route" => "/Dashboard/Rol/Index"
        ]);
        Submodule::create([
            "name_submodules" => "Permisos",
            "id_module" => 1,
            "route" => "/Dashboard/Permission/Index"
        ]);
        Submodule::create([
            "name_submodules" => "Modulos",
            "id_module" => 1,
            "route" => "/Dashboard/Module/Index"
        ]);
        Submodule::create([
            "name_submodules" => "Sub Modulos",
            "id_module" => 1,
            "route" => "/Dashboard/SubModule/Index"
        ]);
        Submodule::create([
            "name_submodules" => "Empresas",
            "id_module" => 1,
            "route" => "/Dashboard/Enterprises/Index"
        ]);
    }
}
