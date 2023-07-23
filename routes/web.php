<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    /* USER */
    Route::get('/Dashboard/User/Index', 'UserController@index')->middleware('can:Dashboard.User.Index')->name('Dashboard.User.Index');
    Route::get('/Dashboard/User/Create', 'UserController@create')->middleware('can:Dashboard.User.Create')->name('Dashboard.User.Create');
    Route::post('/Dashboard/User/Store', 'UserController@store')->middleware('can:Dashboard.User.Store')->name('Dashboard.User.Store');
    Route::post('/Dashboard/User/Password', 'UserController@updateuser')->middleware('can:Dashboard.User.Password')->name('Dashboard.User.Password');
    Route::get('/Dashboard/User/Edit/{id}', 'UserController@edit')->middleware('can:Dashboard.User.Edit')->name('Dashboard.User.Edit');
    Route::post('/Dashboard/User/Update/{id}', 'UserController@update')->middleware('can:Dashboard.User.Update')->name('Dashboard.User.Update');
    Route::get('/Dashboard/User/Show/Module/{id}', 'UserController@show_module')->middleware('can:Dashboard.User.Show.Module')->name('Dashboard.User.Show.Module');
    Route::post('Dashboard/User/Assign_module/{id}', 'UserController@user_assign_module')->middleware('can:Dashboard.User.Assign_module')->name('Dashboard.User.Assign_module');
    Route::get('/Dashboard/User/Hide/Module/{id}', 'UserController@hide_module')->middleware('can:Dashboard.User.Hide.Module')->name('Dashboard.User.Hide.Module');
    Route::post('Dashboard/User/Unssign_module/{id}', 'UserController@user_unssign_module')->middleware('can:Dashboard.User.Unssign_module')->name('Dashboard.User.Unssign_module');
    Route::get('/Dashboard/User/Show/SubModule/{id}', 'UserController@show_submodule')->middleware('can:Dashboard.User.Show.SubModule')->name('Dashboard.User.Show.SubModule');
    Route::post('/Dashboard/User/Show/SubModule/allsubmodule', 'UserController@show_allsubmodule')->middleware('can:Dashboard.User.Show.SubModule.allsubmodule')->name('Dashboard.User.Show.SubModule.allsubmodule');
    Route::post('Dashboard/User/Assign_submodule/{id}', 'UserController@user_assign_submodule')->middleware('can:Dashboard.User.Assign_submodule')->name('Dashboard.User.Assign_submodule');
    Route::get('/Dashboard/User/Hide/SubModule/{id}', 'UserController@hide_submodule')->middleware('can:Dashboard.User.Hide.SubModule')->name('Dashboard.User.Hide.SubModule');
    Route::post('/Dashboard/User/Hide/SubModule/allsubmodule', 'UserController@hide_allsubmodule')->middleware('can:Dashboard.User.Hide.SubModule.allsubmodule')->name('Dashboard.User.Hide.SubModule.allsubmodule');
    Route::post('Dashboard/User/Unssign_submodule/{id}', 'UserController@user_unssign_submodule')->middleware('can:Dashboard.User.Unssign_submodule')->name('Dashboard.User.Unssign_submodule');
    Route::post('/Dashboard/User/Destroy/{id}', 'UserController@destroy')->middleware('can:Dashboard.User.Destroy')->name('Dashboard.User.Destroy');
    Route::post('/Dashboard/User/Restore/{id}', 'UserController@restore')->middleware('can:Dashboard.User.Restore')->name('Dashboard.User.Restore');
    Route::get('/Dashboard/User/Index/Inactivos', 'UserController@archive')->middleware('can:Dashboard.User.Inactivos')->name('Dashboard.User.Inactivos');
    /* end */

    /* ROL */
    Route::get('/Dashboard/Rol/Index', 'RolController@index')->middleware('can:Dashboard.Rol.Index')->name('Dashboard.Rol.Index');
    Route::post('/Dashboard/Rol/Store', 'RolController@store')->middleware('can:Dashboard.Rol.Store')->name('Dashboard.Rol.Store');
    Route::get('/Dashboard/Rol/Show/{id}', 'RolController@show')->middleware('can:Dashboard.Rol.Show')->name('Dashboard.Rol.Show');
    Route::post('Dashboard/Rol/Assign_permission/{id}', 'RolController@rol_assign_permission')->middleware('can:Dashboard.Rol.Assign_permission')->name('Dashboard.Rol.Assign_permission');
    Route::get('/Dashboard/Rol/Hide/{id}', 'RolController@hide')->middleware('can:Dashboard.Rol.Hide')->name('Dashboard.Rol.Hide');
    Route::post('Dashboard/Rol/Unssign_permission/{id}', 'RolController@rol_unssign_permission')->middleware('can:Dashboard.Rol.Unssign_permission')->name('Dashboard.Rol.Unssign_permission');
    Route::get('/Dashboard/Rol/Edit/{id}', 'RolController@edit')->middleware('can:Dashboard.Rol.Edit')->name('Dashboard.Rol.Edit');
    Route::post('/Dashboard/Rol/Update/{id}', 'RolController@update')->middleware('can:Dashboard.Rol.Update')->name('Dashboard.Rol.Update');
    Route::post('/Dashboard/Rol/Destroy/{id}', 'RolController@destroy')->middleware('can:Dashboard.Rol.Destroy')->name('Dashboard.Rol.Destroy');
    /* end */

    /* PERMISSION */
    Route::get('/Dashboard/Permission/Index', 'PermissionController@index')->middleware('can:Dashboard.Permission.Index')->name('Dashboard.Permission.Index');
    Route::post('/Dashboard/Permission/Store', 'PermissionController@store')->middleware('can:Dashboard.Permission.Store')->name('Dashboard.Permission.Store');
    Route::post('/Dashboard/Permission/Update/{id}', 'PermissionController@update')->middleware('can:Dashboard.Permission.Update')->name('Dashboard.Permission.Update');
    Route::post('/Dashboard/Permission/Destroy/{id}', 'PermissionController@destroy')->middleware('can:Dashboard.Permission.Destroy')->name('Dashboard.Permission.Destroy');
    /* end */

    Route::get('/Dashboard/Module/Index', 'ModuleController@index')->middleware('can:Dashboard.Module.Index')->name('Dashboard.Module.Index');
    Route::post('/Dashboard/Module/Store', 'ModuleController@store')->middleware('can:Dashboard.Module.Store')->name('Dashboard.Module.Store');
    Route::post('/Dashboard/Module/Update/{id}', 'ModuleController@update')->middleware('can:Dashboard.Module.Update')->name('Dashboard.Module.Update');
    Route::post('/Dashboard/Module/Destroy/{id}', 'ModuleController@destroy')->middleware('can:Dashboard.Module.Destroy')->name('Dashboard.Module.Destroy');
    Route::get('/Dashboard/Module/Show/{id}', 'ModuleController@show')->middleware('can:Dashboard.Module.Show')->name('Dashboard.Module.Show');
    Route::post('/Dashboard/Module/Assign_rol/{id}', 'ModuleController@module_assign_rol')->middleware('can:Dashboard.Module.Assign_rol')->name('Dashboard.Module.Assign_rol');
    Route::get('/Dashboard/Module/Hide/{id}', 'ModuleController@hide')->middleware('can:Dashboard.Module.Hide')->name('Dashboard.Module.Hide');
    Route::post('/Dashboard/Module/Unsign_rol/{id}', 'ModuleController@module_unssign_rol')->middleware('can:Dashboard.Module.Unsign_rol')->name('Dashboard.Module.Unssign_rol');

    Route::get('/Dashboard/SubModule/Index', 'SubModulesController@index')->middleware('can:Dashboard.SubModule.Index')->name('Dashboard.SubModule.Index');
    Route::post('/Dashboard/SubModule/Store', 'SubModulesController@store')->middleware('can:Dashboard.SubModule.Store')->name('Dashboard.SubModule.Store');
    Route::post('/Dashboard/SubModule/Update/{id}', 'SubModulesController@update')->middleware('can:Dashboard.SubModule.Update')->name('Dashboard.SubModule.Update');
    Route::post('/Dashboard/SubModule/Destroy/{id}', 'SubModulesController@destroy')->middleware('can:Dashboard.SubModule.Destroy')->name('Dashboard.SubModule.Destroy');
    Route::get('/Dashboard/SubModule/Show/{id}', 'SubModulesController@show')->middleware('can:Dashboard.SubModule.Show')->name('Dashboard.SubModule.Show');
    Route::post('/Dashboard/SubModule/Assign_rol/{id}', 'SubModulesController@module_assign_rol')->middleware('can:Dashboard.SubModule.Assign_rol')->name('Dashboard.SubModule.Assign_rol');
    Route::get('/Dashboard/SubModule/Hide/{id}', 'SubModulesController@hide')->middleware('can:Dashboard.SubModule.Hide')->name('Dashboard.SubModule.Hide');
    Route::post('/Dashboard/SubModule/Unsign_rol/{id}', 'SubModulesController@module_unssign_rol')->middleware('can:Dashboard.SubModule.Unsign_rol')->name('Dashboard.SubModule.Unssign_rol');

    Route::get('/Dashboard/Enterprises/Index', 'EnterprisesController@index')->middleware('can:Dashboard.Enterprises.Index')->name('Dashboard.Enterprises.Index');
    Route::post('/Dashboard/Enterprises/Store', 'EnterprisesController@store')->middleware('can:Dashboard.Enterprises.Store')->name('Dashboard.Enterprises.Store');
    Route::post('/Dashboard/Enterprises/Update/{id}', 'EnterprisesController@update')->middleware('can:Dashboard.Enterprises.Update')->name('Dashboard.Enterprises.Update');
    Route::post('/Dashboard/Enterprises/Destroy/{id}', 'EnterprisesController@destroy')->middleware('can:Dashboard.Enterprises.Destroy')->name('Dashboard.Enterprises.Destroy');
    Route::get('/Dashboard/Enterprises/Show/Users/{id}', 'EnterprisesController@show_users')->middleware('can:Dashboard.Enterprises.Show.Users')->name('Dashboard.Enterprises.Show.Users');
    Route::post('/Dashboard/Enterprises/Assign_users/{id}', 'EnterprisesController@enterprise_assign_user')->middleware('can:Dashboard.Enterprises.Assign_users')->name('Dashboard.Enterprises.Assign_users');
    Route::get('/Dashboard/Enterprises/Hide/Users/{id}', 'EnterprisesController@hide_users')->middleware('can:Dashboard.Enterprises.Hide.Users')->name('Dashboard.Enterprises.Hide.Users'); 
    Route::post('/Dashboard/Enterprises/Unssign_users/{id}', 'EnterprisesController@enterprise_unssign_user')->middleware('can:Dashboard.Enterprises.Unssign_users')->name('Dashboard.Enterprises.Unssign_users');
    Route::get('/Dashboard/Enterprises/Show/Modules/{id}', 'EnterprisesController@show_modules')->middleware('can:Dashboard.Enterprises.Show.Modules')->name('Dashboard.Enterprises.Show.Modules');
    Route::post('/Dashboard/Enterprises/Assign_modules/{id}', 'EnterprisesController@enterprise_assign_modules')->middleware('can:Dashboard.Enterprises.Assign_modules')->name('Dashboard.Enterprises.Assign_modules');
    Route::get('/Dashboard/Enterprises/Hide/Modules/{id}', 'EnterprisesController@hide_modules')->middleware('can:Dashboard.Enterprises.Hide.Modules')->name('Dashboard.Enterprises.Hide.Modules'); 
    Route::post('/Dashboard/Enterprises/Unssign_modules/{id}', 'EnterprisesController@enterprise_unssign_modules')->middleware('can:Dashboard.Enterprises.Unssign_modules')->name('Dashboard.Enterprises.Unssign_modules');
    Route::get('/Dashboard/Enterprises/Show/SubModules/{id}', 'EnterprisesController@show_submodules')->middleware('can:Dashboard.Enterprises.Show.SubModules')->name('Dashboard.Enterprises.Show.SubModules');
    Route::post('/Dashboard/Enterprises/Show/SubModule/allsubmodule', 'EnterprisesController@show_allsubmodules')->middleware('can:Dashboard.Enterprises.Show.SubModule.allsubmodules')->name('Dashboard.Enterprises.Show.SubModule.allsubmodules');
    Route::post('/Dashboard/Enterprises/Assign_submodules/{id}', 'EnterprisesController@enterprise_assign_submodules')->middleware('can:Dashboard.Enterprises.Assign_submodules')->name('Dashboard.Enterprises.Assign_submodules');
    Route::get('/Dashboard/Enterprises/Hide/SubModules/{id}', 'EnterprisesController@hide_submodules')->middleware('can:Dashboard.Enterprises.Hide.SubModules')->name('Dashboard.Enterprises.Hide.SubModules'); 
    Route::post('/Dashboard/Enterprises/Hide/SubModule/allsubmodule', 'EnterprisesController@hide_allsubmodules')->middleware('can:Dashboard.Enterprises.Hide.SubModule.allsubmodules')->name('Dashboard.Enterprises.Hide.SubModule.allsubmodules');
    Route::post('/Dashboard/Enterprises/Unssign_submodules/{id}', 'EnterprisesController@enterprise_unssign_submodules')->middleware('can:Dashboard.Enterprises.Unssign_submodules')->name('Dashboard.Enterprises.Unssign_submodules');

});