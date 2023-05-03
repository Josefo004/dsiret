<?php

use App\Http\Controllers\Formularios\FormularioController;
use App\Http\Controllers\Fpdf\PdfController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\Sempresas\SempresaController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Commands\Show;

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
    return redirect('/index');
});

// Route::get('/pdf2', function (Codedge\Fpdf\Fpdf\Fpdf $fpdf) {

//     $fpdf->AddPage();
//     $fpdf->SetFont('Courier', 'B', 18);
//     $fpdf->Cell(50, 25, 'Hello World!');
//     $fpdf->Output();
//     exit;

// });

Auth::routes();


Route::get('/formulario', 'PersonController@create')->name('person.create');

Route::post('formulario/store', 'PersonController@store')->name('registrarpersona');
Route::get('formulario/store', function () {
    return redirect('/index');
});
//Route::get('/view', 'PersonController@store')->name('personas.view2');

Route::get('/formulario/info', 'WebController@info')->name('formulario.info');
Route::get('/formulario/infoperson/{id}', 'WebController@infoperson')->name('formulario.infoperson');//->middleware('valperson');

Route::post('/formulario/cerrar', 'WebController@cerrar')->name('formulario.cerrar');//formulario.cerrar

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/formulario', 'PersonaController@create')->name('persona.create');

Route::get('/index', 'WebController@index')->name('index');
Route::get('/informacion', 'WebController@informacion')->name('informacion');



Route::post('web/store','WebController@store')->name('web.store')->middleware('valperson');

Route::post('web/register','WebController@register')->name('web.register');

Route::group(['prefix' => 'adminweb'], function(){
    Route::get('forms','FormController@index')->name('forms.index');//->middleware('permission:view-users');
});

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

Route::group(['prefix' => 'siret'], function () {
    Route::get('formularios', [FormularioController::class, 'index'])->name(('formularios.index'));
    Route::get('api/formularios', [FormularioController::class, 'apiFormularios'])->name(('api.formularios'));
    Route::get('formularios/show/{id}', [FormularioController::class, 'show'])->name(('formularioMostrar'));

    Route::get('trabajos', [FormularioController::class, 'trabajos'])->name(('formularios.trabajos'));
    Route::get('api/trabajos', [FormularioController::class, 'apiTrabajos'])->name(('api.trabajos'));

    Route::get('empresas', [SempresaController::class, 'index'])->name(('sempresas.index'));
    Route::get('api/empresas', [SempresaController::class, 'apiEmpresas'])->name(('api.empresas'));
    Route::get('sempresas/crear', [SempresaController::class, 'create'])->name('sempresas.crear');
    Route::get('sempresas/show/{id}', [SempresaController::class, 'show'])->name('sempresasMostrar');
    Route::post('sempresas/store', [SempresaController::class, 'store'])->name('sempresas.store');
    Route::get('sempresas/requ/{id}', [SempresaController::class, 'requ'])->name('sempresasRequerimiento');
    Route::post('sempresas/requ/store', [SempresaController::class, 'requStore'])->name('sempresasNuevoRequerimiento');
    Route::get('sempresas/requ/delete/{id}', [SempresaController::class, 'requDelete'])->name('sempresasEliminarRequerimiento');
    Route::get('sempresas/requ/search/{id}', [SempresaController::class, 'requSearch'])->name('sempresasBuscarRequerimiento');

    Route::get('fpdf', [PdfController::class, 'index'])->name(('mipdf'));
    Route::get('fpdf/seleccionados/{req_id}', [PdfController::class, 'seleccionados'])->name(('mipdf'));
});
//Route::get('formulario/show/{id}', [PersonController::class, 'show'])->name('formularioMostrar');

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
