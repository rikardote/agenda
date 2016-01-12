<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EspecialidadesRequest;

class EspecialidadesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('admin/especialidades/index');
    }
    public function create()
    {
    	$especialidades = "";
        return view('admin.especialidades.create')->with('especialidades', $especialidades);
    }
    public function store(EspecialidadesRequest $request)
    {
        $employe = new Employe($request->all());
        $employe->save();

        Flash::success('Empleado registrado con exito!');
        return redirect()->route('employees.index');
    }   
}
