<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
/* use Illuminate\Support\Facades\Auth; */
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
/* use App\User;
use App\Enterprise;
use App\SubModule;
use App\UserModule; */

use App\User;
use App\Module;
use App\SubModule;
use App\Enterprise;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
        Schema::defaultStringLength(191);

      /* This code is registering a view composer that will be executed for all views. The composer is
      responsible for sharing data with the views. */
        View::composer('*', function ($view) {     
            //Verificamos si el usuario esta registrado
            if (auth()->check()) {

                $ent = Enterprise::find(Auth::user()->enterprises_id);
                $userId = Auth::id();
               
                $user = User::find($userId);
                
                $modules = $user->modules->sortBy('id')->values()->all(); 

                foreach ($modules as $module) {

                    $subModulesJson = $module->pivot->sub_modules;
                    //decodificamos el json de los submodulos de la pivot
                    $subModules = json_decode($subModulesJson);
                    //agregamos los submodulos a una variable 
                    $module->pivot->sub_modules = $subModules;
                    // Obtener todos los submódulos asociados al módulo actual solo si esta activo
                    $SubModules = SubModule::whereIn('id', $subModules)->where('is_active', true)->get();
                    // Almacenamos en una variable 
                    $module->SubModules = $SubModules;

                }
                View::share(['modules' => $modules, 'ent' => $ent]);

            }
        });

    }
}
