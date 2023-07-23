<?php

use Illuminate\Database\Seeder;
use App\UserModule;
use Illuminate\Support\Facades\DB;

class UserModuleSubmoduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserModule::create([
            "user_id" => 1,
            "module_id" => 1,
            "sub_modules" => "[1,2,3,4,5,6,7]"
        ]);   
        UserModule::create([
            "user_id" => 2,
            "module_id" => 1,
            "sub_modules" => "[1,2]"
        ]);        
    }
}
