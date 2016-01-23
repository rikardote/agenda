<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::get('/', [
        'as' => 'admin.index',
        'uses' => 'AgendaController@index'
    ]);

    Route::auth();
    // Route::get('registrar','RegistroController@index');
    Route::resource('registrar', 'RegistroController');   
    Route::get('registrar/{id}/destroy', [
        'uses' => 'RegistroController@destroy',
        'as' => 'registrar.destroy'
    ]);

    Route::resource('agenda', 'AgendaController');
    
   // Rutas Especialidades //
    Route::resource('especialidades', 'EspecialidadesController');
    
    Route::get('especialidades/{id}/destroy', [
		'uses' => 'EspecialidadesController@destroy',
		'as' => 'admin.especialidades.destroy'
	]);
    // Rutas Medicos //
    Route::resource('medicos', 'MedicosController');
    Route::get('medicos/{id}/destroy', [
        'uses' => 'MedicosController@destroy',
        'as' => 'admin.medicos.destroy'
    ]);

     // Rutas Horarios //
    Route::resource('horarios', 'HorariosController');
    Route::get('horarios/{id}/destroy', [
        'uses' => 'HorariosController@destroy',
        'as' => 'admin.horarios.destroy'
    ]);
    // Rutas Pacientes //
    Route::resource('pacientes', 'PacientesController');
    Route::get('pacientes/{id}/destroy', [
        'uses' => 'PacientesController@destroy',
        'as' => 'admin.pacientes.destroy'
    ]);
    // Rutas Citas //
    //Route::resource('citas', 'CitasController');
    Route::get('citas/{id}/{date}', [
        'uses' => 'CitasController@show',
        'as' => 'admin.citas.show'
    ]);
    Route::patch('citas/{slug}/{date}/{id}/update', [
        'uses' => 'CitasController@update',
        'as' => 'admin.citas.update'
    ]);
    Route::get('citas/{slug}/{date}/{id}/edit', [
        'uses' => 'CitasController@edit',
        'as' => 'admin.citas.edit'
    ]);
    Route::get('citas/{slug}/{date}/{id}/destroy', [
        'uses' => 'CitasController@destroy',
        'as' => 'admin.citas.destroy'
    ]);
    Route::get('citas/{id}/{date}/nueva_cita/', [
        'uses' => 'CitasController@nueva_cita',
        'as' => 'citas.nueva_cita'
    ]);
    Route::post('citas/{slug}/{date}/nueva_cita/paciente', [
        'uses' => 'CitasController@store',
        'as' => 'admin.citas.store'
    ]);
        Route::get('citas/{slug}/{date}/{id}/concretada', [
        'uses' => 'CitasController@concretada',
        'as' => 'admin.citas.concretada'
    ]);



    Route::get('citas/{slug}/{date}/nueva_cita/paciente', [
        'uses' => 'SearchPacientesController@index',
        'as' => 'pacientes.search'
    ]);
    
    Route::get('citas/{slug}/{date}/nueva_cita/paciente/nuevo_paciente/{rfc}', [
        'uses' => 'SearchPacientesController@NuevoPaciente',
        'as' => 'admin.pacientes.create'
    ]);
    
    Route::post('citas/{slug}/{date}/nueva_cita/paciente/nuevo_paciente/create', [
        'uses' => 'SearchPacientesController@StorePaciente',
        'as' => 'admin.pacientes.store'
    ]);
});
