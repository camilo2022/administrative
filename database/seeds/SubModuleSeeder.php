<?php

use App\SubModule;
use Illuminate\Database\Seeder;

class SubModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubModule::create([
            "name_submodules" => "Registro de usuarios",
            "id_module" => 1,
            "route" => "/Dashboard/User/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Usuarios inactivos",
            "id_module" => 1,
            "route" => "/Dashboard/User/Index/Inactivos"
        ]);
        SubModule::create([
            "name_submodules" => "Roles",
            "id_module" => 1,
            "route" => "/Dashboard/Rol/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Permisos",
            "id_module" => 1,
            "route" => "/Dashboard/Permission/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Modulos",
            "id_module" => 1,
            "route" => "/Dashboard/Module/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Sub Modulos",
            "id_module" => 1,
            "route" => "/Dashboard/SubModule/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Empresas",
            "id_module" => 1,
            "route" => "/Dashboard/Enterprises/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Pais",
            "id_module" => 2,
            "route" => "/Dashboard/Country/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Departamento",
            "id_module" => 2,
            "route" => "/Dashboard/Departament/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Ciudad",
            "id_module" => 2,
            "route" => "/Dashboard/City/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Area",
            "id_module" => 3,
            "route" => "/Dashboard/Area/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Cargo",
            "id_module" => 3,
            "route" => "/Dashboard/Post/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Rango de Autoridad",
            "id_module" => 3,
            "route" => "/Dashboard/Rank/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Tipo de Contratos",
            "id_module" => 3,
            "route" => "/Dashboard/TypeContract/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Tipo de Documentos",
            "id_module" => 3,
            "route" => "/Dashboard/TypeDocument/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Caja de Compensación",
            "id_module" => 3,
            "route" => "/Dashboard/Box/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Pensión",
            "id_module" => 3,
            "route" => "/Dashboard/Pension/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Banco",
            "id_module" => 3,
            "route" => "/Dashboard/Bank/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Arl",
            "id_module" => 3,
            "route" => "/Dashboard/Arl/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Eps",
            "id_module" => 3,
            "route" => "/Dashboard/Eps/Index"
        ]);
        SubModule::create([
            "name_submodules" => "Empleados",
            "id_module" => 4,
            "route" => "/Dashboard/Employee/Index"
        ]);
    }
}
