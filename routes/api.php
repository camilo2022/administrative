<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('Dashboard/Person/index', function(){

   
   return datatables()->eloquent(App\Person::query())->addColumn('btn', 'Dashboard.Person.actions')->rawColumns(['btn'])->toJson(); 

  });

  

  Route::get('Dashboard/Employee/index', function(){


  });

 



  