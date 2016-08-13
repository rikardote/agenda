<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PacientesRequest;
use App\Paciente;
use App\Medico;
use App\Tipo;
use App\Cita;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use Alert;

class SearchPacientesController extends Controller
{
		public function __construct()
	    {
	        setlocale(LC_ALL,"es_MX.utf8");
	    }
	    public function index(Request $request, $slug, $date)
		{
		 
		   	// Gets the query string from our form submission 
		    $query = $request->rfc;
		    // Returns an array of articles that have the query string located somewhere within 
		    // our articles titles. Paginates them so we can break up lots of search results.
		  	$pacientes = Paciente::where('rfc', '=', $query)->get();
		  	$pacientes->each(function($pacientes) {
          	  $pacientes->tipo;
      		});
		   	$medico = Medico::findBySlug($slug);
			$medico->especialidad;
			$medico->horario;

			$todas_citas = Cita::getTotalCitas($medico->id, $date);
	        $horas_usadas = Cita::where('fecha', '=', $date)->where('medico_id', '=', $medico->id)->lists('horario', 'id')->toArray();
	        $horas = array();
	        foreach ($horas_usadas as $hora) {
	            $horas[] = '["'.Carbon::createFromFormat('H:i', $hora)->toTimeString().'","'.Carbon::createFromFormat('H:i', $hora)->addMinutes(20)->toTimeString().'"]';          
	        }
	        $horas = implode(",",$horas);
	        $entrada = $medico->horario->entrada;
        	$salida = $medico->horario->salida;
			// returns a view and passes the view the list of articles and the original query.
		    return view('admin.citas.create')
		    	->with('pacientes', $pacientes)
		    	->with('medico', $medico)
		    	->with('date', $date)
		    	->with('todas_citas', $todas_citas)
		    	->with('horas', $horas)
		    	->with('entrada', $entrada)
            	->with('salida', $salida);
	 }
	 public function NuevoPaciente($slug, $date, $rfc){

	 	$tipos = Tipo::all()->lists('tipo', 'id')->toArray();
        asort($tipos);
           
	 	return view('admin.pacientes.form_nuevo')->with('tipos', $tipos)->with('slug',$slug)->with('date',$date)->with('rfc',$rfc);
	 }
	 public function StorePaciente(PacientesRequest $request, $slug, $date)
    {
    	
        $paciente = new Paciente($request->all());
        $paciente->fecha_nacimiento = fecha_ymd($request->fecha_nacimiento);

        if ($paciente->save()) {
            return response()->json('',200);
            
        }else{
            return response()->json('',500);
        }
    }  

    public function EditPaciente($slug, $date, $id)
    {
    	$paciente = Paciente::find($id);
        $paciente->colonia;

	 	$tipos = Tipo::all()->lists('tipo', 'id')->toArray();
        asort($tipos);
        
	 	return view('admin.pacientes.form_edit')->with('paciente', $paciente)->with('tipos', $tipos)->with('slug',$slug)->with('date',$date)->with('rfc',$paciente->rfc);
	 }
     
	public function UpdatePaciente(PacientesRequest $request, $slug, $date, $id)
    {
    	
        $paciente = Paciente::find($id);
        $paciente->fill($request->all());
        $paciente->fecha_nacimiento = fecha_ymd($request->fecha_nacimiento);
        if ($paciente->save()) {
            return response()->json('',200);
            
        }else{
            return response()->json('',500);
        }
    }  
}
