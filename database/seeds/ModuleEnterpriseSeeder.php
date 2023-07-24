<?php

use Illuminate\Database\Seeder;
use App\ModuleEnterprise;

class ModuleEnterpriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModuleEnterprise::create([ 'modules_id' => 1, 'enterprises_id' => 1, ]);
        ModuleEnterprise::create([ 'modules_id' => 2, 'enterprises_id' => 1, ]);
        ModuleEnterprise::create([ 'modules_id' => 3, 'enterprises_id' => 1, ]);
    }
}
