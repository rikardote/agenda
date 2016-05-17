<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Medico;
use App\Cita;
use App\Permiso;

use Laracasts\Flash\Flash;

class PermisosController extends Controller
{
	public function index()
	{
	    $permisos = Permiso::all(); 
	    $permisos->each(function($permisos) {
            $permisos->medico;
        });

	    return view('admin.medicos.permisos.index')->with('permisos', $permisos);
    }
    public function create()
    {
        $medicos = Medico::all()->lists('fullname', 'id')->toArray();

    	asort($medicos);
    	return view('admin.medicos.permisos.create')->with('medicos', $medicos);

    }
    public function edit($permiso_id)
    {
        $permiso = Permiso::find($permiso_id);
        $permiso->medico;

        return view('admin.medicos.permisos.create')->with('permiso', $permiso);

    }
    public function store(Request $request)
    {
        $permiso = new Permiso($request->all());
        $permiso->fecha_inicio = fecha_ymd($request->fecha_inicio);
        $permiso->fecha_final = fecha_ymd($request->fecha_final);
        $permiso->save();

        Flash::success('Permiso registrado con exito!');
        return redirect()->route('medico.permisos.index');
    }
    public function destroy($medico_id)
    {
        $permiso = Permiso::find($medico_id);
        $permiso->delete();

        Flash::error('Permiso borrado con exito!');
        return redirect()->route('medico.permisos.index');
    }
}
