<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CitasRequest;

use App\Cita;
use App\Especialidad;
use App\Medico;
use Laracasts\Flash\Flash;

class CitasController extends Controller

{
	public function consultar($slug){
		$medico = Medico::findBySlug($slug);
		$medico->especialidad;
		return view('admin.citas.index')->with('medico', $medico);	
	}
    
}
