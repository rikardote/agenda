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
        'as' => 'home.index',
        'uses' => 'HomeController@index'
    ]);

    Route::auth();
    /*Route::get('agenda/login', 'Auth\AuthController@getLogin');
    Route::post('agenda/login', 'Auth\AuthController@postLogin');
    Route::get('agenda/logout', 'Auth\AuthController@getLogout');
    */
    // Route::get('registrar','RegistroController@index');
    Route::resource('registrar', 'RegistroController');   
    Route::get('registrar/{id}/destroy', [
        'uses' => 'RegistroController@destroy',
        'as' => 'registrar.destroy'
    ]);
    Route::resource('registrar_medicos', 'RegistroMedicosController');   
    Route::get('registrar_medicos/{id}/destroy', [
        'uses' => 'RegistroMedicosController@destroy',
        'as' => 'registrar_medicos.destroy'
    ]);

    Route::resource('agenda', 'AgendaController');
    Route::resource('hojas', 'HojasController');
    Route::get('hojas/{paciente_id}/{medico_id}/{cita_id}', [
        'uses' => 'HojasController@custom_create',
        'as' => 'custom.hojas.create'
    ]);
    Route::get('hojas/{fecha}/avanzar', [
        'uses' => 'HojasController@avanzar',
        'as' => 'custom.hojas.avanzar'
    ]);
    
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
    Route::resource('codigos', 'CodigosController');
    Route::get('codigos/{id}/destroy', [
        'uses' => 'CodigosController@destroy',
        'as' => 'admin.codigos.destroy'
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
    Route::get('hojas/{medico_id}/{date}/{cita_id}/editar', [
        'uses' => 'HojasController@citas_editar',
        'as' => 'hoja.citas.edit'
    ]);
    Route::patch('hojas/{medico_id}/{date}/{cita_id}/actualizar', [
        'uses' => 'HojasController@update',
        'as' => 'hoja.citas.update'
    ]);
     Route::post('medico_citas/gethoras', [
        'uses' => 'HojasController@gethoras',
        'as' => 'hoja.gethoras'
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

    Route::get('api/codigos', function (){
        return Datatables::eloquent(App\Cie::query())
        ->make(true);
    });
    Route::get('/getdata', [
        'uses' => 'CodigosController@autocomplete',
        'as' => 'codigos.autocomplete'
    ]);
    Route::get('medicos_citas/{date}/nueva_cita/', [
        'uses' => 'HojasController@nueva_cita',
        'as' => 'medico.nueva_cita'
    ]);
    Route::get('medicos_citas/crear/', [
        'uses' => 'HojasController@show',
        'as' => 'medico.nueva_cita.show'
    ]);

    Route::get('medico_citas/paciente/{date}/search', [
        'uses' => 'HojasController@search_paciente',
        'as' => 'medico.pacientes.search'
    ]);
    Route::post('medico_citas/paciente/{date}', [
        'uses' => 'HojasController@cita_store',
        'as' => 'medicos.cita.store'
    ]);
    Route::resource('medico/permisos', 'PermisosController');
    Route::get('medico/permisos/{id}/destroy', [
        'uses' => 'PermisosController@destroy',
        'as' => 'medico.permisos.destroy'
    ]);
    Route::get('reportes', [
        'uses' => 'ReportesController@index',
        'as' => 'reporte.index'
    ]);
    Route::get('reportes/{date}', [
        'uses' => 'ReportesController@pdf',
        'as' => 'reporte.pdf'
    ]);


    Route::get('home', 'HomeController@index');
    Route::get('/doctor/login', 'UserdoctorsController@showLoginForm');
    Route::post('/doctor/login', 'UserdoctorsController@login');
    Route::get('/doctor/logout', 'UserdoctorsController@logout');

});

