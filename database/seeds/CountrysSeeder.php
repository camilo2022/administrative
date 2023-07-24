<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountrysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([ "tourism_code"=>"00" , "name"=>"-", "country_code"=>"00"]);
        Country::create([ "tourism_code"=>"CO" , "name"=>"COLOMBIA", "country_code"=>"57"]);
        Country::create([ "tourism_code"=>"VE" , "name"=>"VENEZUELA", "country_code"=>"58"]);
        Country::create([ "tourism_code"=>"PE" , "name"=>"PERU", "country_code"=>"51"]);
        Country::create([ "tourism_code"=>"EC" , "name"=>"ECUADOR", "country_code"=>"593"]);
        Country::create([ "tourism_code"=>"CL" , "name"=>"CHILE", "country_code"=>"56"]);
        Country::create([ "tourism_code"=>"UY" , "name"=>"URUGUAY", "country_code"=>"598"]);
        Country::create([ "tourism_code"=>"AR" , "name"=>"ARGENTINA", "country_code"=>"54"]);
        Country::create([ "tourism_code"=>"BR" , "name"=>"BRAZIL", "country_code"=>"55"]);
        Country::create([ "tourism_code"=>"BO" , "name"=>"BOLIVIA", "country_code"=>"591"]);
        Country::create([ "tourism_code"=>"PY" , "name"=>"PARAGUAY", "country_code"=>"595"]);
    }
}
