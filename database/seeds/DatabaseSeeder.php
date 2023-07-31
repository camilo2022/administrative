<?php

use App\City;
use App\Departament;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(EnterpriseSeeder::class);
        $this->call(RolesandPermissionSeeder::class);
        $this->call(ModulesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SubModuleSeeder::class);
        $this->call(UserModuleSubmoduleSeeder::class);
        $this->call(RolModulesSeeder::class);
        $this->call(UserEnterpriseSeeder::class);
        $this->call(ModuleEnterpriseSeeder::class);
        $this->call(SubModuleEnterpriseSeeder::class);
        $this->call(RolSubModulesSeeder::class);
        $this->call(CountrysSeeder::class);
        $this->call(DepartamentsSeeder::class);
        $this->call(CitysSeeder::class);
        $this->call(ArlSeeder::class);
        $this->call(EpsSeeder::class);
        $this->call(RankSeeder::class);
        $this->call(DocumentTypeSeeder::class);
        $this->call(ContractTypeSeeder::class);
    }
}
