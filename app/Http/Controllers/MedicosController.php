<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\MedicosRequest;
use App\Consultorio;
use App\Medico;
use App\Especialidad;
use App\Horario;
use App\Diasconsulta;
use Laracasts\Flash\Flash;

class MedicosController extends Controller
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
    	$medicos = Medico::orderBy('apellido_pat', 'ASC')->get();

        $medicos->each(function($medicos) {
            $medicos->especialidad;
            $medicos->horario;
            
        });
    
    	return view('admin/medicos/index')->with('medicos', $medicos);
    }

    public function create()
    {
    	$especialidades = Especialidad::all()->lists('name', 'id')->toArray();
    	$horarios = horario::all()->lists('todos', 'id')->toArray();
        $diasConsulta = Diasconsulta::all()->lists('day_name', 'id')->toArray();
        $consultorios = Consultorio::orderBy('name', 'ASC')->lists('name', 'id')->toArray();
        asort($consultorios);
        return view('admin.medicos.createorupdate')
        	->with('especialidades', $especialidades)
        	->with('horarios', $horarios)
            ->with('diasConsulta', $diasConsulta)
            ->with('consultorios', $consultorios);
    }
 
    public function edit($id)
    {
        $medico = Medico::find($id);
        $especialidades = Especialidad::all()->lists('name', 'id')->toArray();
        $diasConsulta = Diasconsulta::all()->lists('day_name', 'id')->toArray();
        $horarios = horario::all()->lists('todos', 'id')->toArray();
        $diasconsulta_select = $medico->diasconsulta->lists('id')->toArray();
        $consultorios = Consultorio::orderBy('name', 'ASC')->lists('name', 'id')->toArray();
        asort($consultorios);
       
        return view('admin.medicos.createorupdate')
            ->with('medico', $medico)
            ->with('especialidades', $especialidades)
            ->with('horarios', $horarios)
            ->with('diasconsulta_select', $diasconsulta_select)
            ->with('diasConsulta', $diasConsulta)
             ->with('consultorios', $consultorios);
        
        
    }

    public function update(Request $request, $id)
    {
        $medico = Medico::find($id);
        $medico->fill($request->all());

        $medico->save();

        $medico->diasconsulta()->sync($request->d_consulta);
        Flash::success('Medico editado con exito!');
        return redirect()->route('medicos.index');
    }

    public function store(MedicosRequest $request)
    {

        $medico = new Medico($request->all());
        $medico->save();
        $medico->diasconsulta()->sync($request->d_consulta);

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
