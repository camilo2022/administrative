<?php

use Illuminate\Database\Seeder;
use App\Enterprise;

class EnterpriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
        Enterprise::create([
            'name_enterprise' => 'Empresa 1',
        ]);
    }
}
