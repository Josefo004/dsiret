<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Rutas de prueba de plugins [borrar]
*/
Route::get('/home/crearpdf', 'HomeController@crearpdf')->name('crear.pdf');
Route::get('/home/fechas', 'HomeController@formatofechas')->name('formato.fechas');
Route::get('/home/exportarexcel', 'HomeController@exportarexcel')->name('crear.xls');
Route::get('/home/registraractividad', 'HomeController@registrar_actividad')->name('registrar.actvidad');

/**
 * Empresa
*/
Route::get('empresa','EmpresaController@index')->name('empresas.index')->middleware('permission:config-emp');
Route::post('empresa/store', 'EmpresaController@store')->name('empresas.store')->middleware('permission:config-emp');
Route::post('empresa/{empresa}/upload','EmpresaController@upload')->name('empresas.upload')->middleware('permission:config-emp');


/**
 * Rutas de administrador
*/
Route::group(['prefix' => 'administracion'], function(){
    /**
     * Usuarios
    */    
    Route::get('usuarios','UserController@index')->name('users.index')->middleware('permission:view-users');
    Route::get('usuarios/{id}/editar','UserController@edit')->name('users.edit')->middleware('permission:edit-users');
    Route::put('usuarios/{user}', 'UserController@update')->name('users.update')->middleware('permission:edit-roles');
    Route::get('usuarios/crear','UserController@create')->name('users.create')->middleware('permission:create-users');    
    Route::post('usuarios/store','UserController@store')->name('users.store')->middleware('permission:create-users');
    Route::delete('usuarios/{id}/delete', 'UserController@destroy')->name('users.destroy')->middleware('permission:delete-users');
    Route::post('usuarios/{user}/upload','UserController@uploadphoto')->name('users.uploadphoto')->middleware('permission:photo-users');
    Route::post('usuarios/{user}/uploadcharacter','UserController@uploadcharacter')->name('users.uploadcharacter')->middleware('permission:character-users');

    /**
     * Roles
    */
    Route::get('roles','RoleController@index')->name('roles.index')->middleware('permission:view-roles');
    Route::get('roles/crear','RoleController@create')->name('roles.create')->middleware('permission:create-roles');
    Route::post('roles/store','RoleController@store')->name('roles.store')->middleware('permission:create-roles');
    Route::get('roles/{id}/editar','RoleController@edit')->name('roles.edit')->middleware('permission:edit-roles');
    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:edit-roles');
    Route::delete('roles/{id}/delete', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:delete-roles');

    /**
     * Actividad
    */
    Route::get('actividad','UserController@indexActivity')->name('activity.index');// ->middleware('permission:view-activity');
});

/**
 * Perfil de Usuario
*/
Route::get('perfil','UserController@perfil')->name('users.perfil');
Route::put('perfil/{user}/password','UserController@updatepassword')->name('users.updatepassword')->middleware('permission:password-perfil');
Route::put('perfil/update/{user}','UserController@updateperfil')->name('users.updateperfil')->middleware('permission:edit-perfil');
Route::post('perfil/{user}/upload','UserController@upload')->name('users.upload')->middleware('permission:up-perfil');

/**
 * API
*/
Route::get('api/roles','RoleController@apiRoles')->name('roles.apiRoles');
Route::get('api/users','UserController@apiUsers')->name('users.apiUsers');
Route::get('api/activity','UserController@apiActivity')->name('users.apiActivity');