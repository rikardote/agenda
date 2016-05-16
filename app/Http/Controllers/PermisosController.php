<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Medico;
use App\Cita;
use App\Permiso;

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
}
