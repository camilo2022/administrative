<?php

use Illuminate\Database\Seeder;
use App\RolModule;

class RolModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolModule::create([ 'id_rol' => 1, 'id_module' => 1 ]);
        RolModule::create([ 'id_rol' => 1, 'id_module' => 2 ]);
        RolModule::create([ 'id_rol' => 1, 'id_module' => 3 ]);
        RolModule::create([ 'id_rol' => 1, 'id_module' => 4 ]);
        RolModule::create([ 'id_rol' => 1, 'id_module' => 5 ]);
        RolModule::create([ 'id_rol' => 1, 'id_module' => 6 ]);
        RolModule::create([ 'id_rol' => 1, 'id_module' => 7 ]);
        RolModule::create([ 'id_rol' => 1, 'id_module' => 8 ]);

        RolModule::create([ 'id_rol' => 2, 'id_module' => 1 ]);
    }
}
