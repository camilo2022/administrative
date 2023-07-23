<?php

use Illuminate\Database\Seeder;
use App\RolSubModule;

class RolSubModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolSubModule::create([ 'id_rol' => 1, 'id_submodule' => 1 ]);
        RolSubModule::create([ 'id_rol' => 1, 'id_submodule' => 2 ]);
        RolSubModule::create([ 'id_rol' => 1, 'id_submodule' => 3 ]);
        RolSubModule::create([ 'id_rol' => 1, 'id_submodule' => 4 ]);
        RolSubModule::create([ 'id_rol' => 1, 'id_submodule' => 5 ]);
        RolSubModule::create([ 'id_rol' => 1, 'id_submodule' => 6 ]);
        RolSubModule::create([ 'id_rol' => 1, 'id_submodule' => 7 ]);
        RolSubModule::create([ 'id_rol' => 2, 'id_submodule' => 1 ]);
        RolSubModule::create([ 'id_rol' => 2, 'id_submodule' => 2]);

    }
}
