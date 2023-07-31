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
            "user_id" => 1,
            "module_id" => 2,
            "sub_modules" => "[8,9,10]"
        ]);
        UserModule::create([
            "user_id" => 1,
            "module_id" => 3,
            "sub_modules" => "[11,12,13,14,15,16,17,18,19,20]"
        ]);
        UserModule::create([
            "user_id" => 1,
            "module_id" => 4,
            "sub_modules" => "[21]"
        ]);
        UserModule::create([
            "user_id" => 1,
            "module_id" => 5,
            "sub_modules" => "[]"
        ]);
        UserModule::create([
            "user_id" => 1,
            "module_id" => 6,
            "sub_modules" => "[]"
        ]);
        UserModule::create([
            "user_id" => 1,
            "module_id" => 7,
            "sub_modules" => "[]"
        ]);
        UserModule::create([
            "user_id" => 1,
            "module_id" => 8,
            "sub_modules" => "[]"
        ]);
        UserModule::create([
            "user_id" => 2,
            "module_id" => 1,
            "sub_modules" => "[1,2]"
        ]);
    }
}
