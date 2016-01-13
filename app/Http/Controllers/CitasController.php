<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CitasRequest;

use App\Cita;
use App\Especialidad;
use App\Medico;
use App\Pacientes;
use Laracasts\Flash\Flash;

class CitasController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function show($slug){
		$medico = Medico::findBySlug($slug);
		$medico->especialidad;
		return view('admin.citas.index')->with('medico', $medico);	
	}
	public function nueva_cita($slug)
    {
    	$medico = Medico::findBySlug($slug);
		$medico->especialidad;
       return view('admin.citas.createorupdate')->with('medico', $medico);
        	
    }
	public function create($medico_id)
    {
    	
        return view('admin.citas.createorupdate');
        	
    }


    public function edit($id)
    {
        $medico = Medico::find($id);
        $especialidades = Especialidad::all()->lists('name', 'id')->toArray();
        $horarios = horario::all()->lists('name', 'id')->toArray();
        return view('admin.medicos.createorupdate')
            ->with('medico', $medico)
            ->with('especialidades', $especialidades)
            ->with('horarios', $horarios);
        
        
    }

    public function update(Request $request, $id)
    {
        $medico = Medico::find($id);
        $medico->fill($request->all());

        $medico->save();
        Flash::success('Medico editado con exito!');
        return redirect()->route('medicos.index');
    }

    public function store(MedicosRequest $request)
    {
        $medico = new Medico($request->all());
        $medico->save();

        Flash::success('Medico registrado con exito!');
        return redirect()->route('medicos.index');
    }  

    public function destroy($id)
    {
        $medico = Medico::find($id);
        $medico->delete();

        Flash::error('El Medico ' . $medico->name . ' ha sido borrada con exito!');
        return redirect()->route('medicos.index');
    } 
	
    
}
