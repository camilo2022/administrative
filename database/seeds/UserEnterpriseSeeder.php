<?php

use Illuminate\Database\Seeder;
use App\UserEnterprise;

class UserEnterpriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserEnterprise::create([
            'user_id' => 1,
            'enterprises_id' => 1,
        ]);

        UserEnterprise::create([
            'user_id' => 2,
            'enterprises_id' => 1,
        ]);
    }
}
