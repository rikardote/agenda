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
        if (!\Auth::user()->admin()) {
            return redirect()->route('agenda.index');
        }
    	$especialidades = Especialidad::orderBy('name', 'ASC')->get();
    	return view('admin/especialidades/index')->with('especialidades', $especialidades);
    }

    public function create()
    {
    	
        return view('admin.especialidades.createorupdate');
    }

    public function edit($id)
    {
        $especialidad = Especialidad::find($id);
        
        return view('admin.especialidades.createorupdate')->with('especialidad', $especialidad);
    }

    public function update(Request $request, $id)
    {
        $especialidad = Especialidad::find($id);
        $especialidad->fill($request->all());

        $especialidad->save();
        Flash::success('Especialidad editada con exito!');
        return redirect()->route('especialidades.index');
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
