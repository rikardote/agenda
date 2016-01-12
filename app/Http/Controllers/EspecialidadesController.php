<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EspecialidadesRequest;
use App\Especialidad;
use Laracasts\Flash\Flash;

class EspecialidadesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {	
    	$especialidades = Especialidad::orderBy('name', 'DESC')->get();
    	return view('admin/especialidades/index')->with('especialidades', $especialidades);
    }
    public function create()
    {
    	$especialidades = "";
        return view('admin.especialidades.create')->with('especialidades', $especialidades);
    }
    public function store(EspecialidadesRequest $request)
    {
        $especialidad = new Especialidad($request->all());
        $especialidad->save();

        Flash::success('Especialidad registrada con exito!');
        return redirect()->route('especialidades.index');
    }  
    public function destroy($id)
    {
        $especialidad = Especialidad::find($id);
        $especialidad->delete();

        Flash::error('La especialidad ' . $especialidad->name . ' ha sido borrada con exito!');
        return redirect()->route('especialidades.index');
    } 
}
