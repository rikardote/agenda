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
			$todas_citas = Cita::getTotalCitas($medico->id, $date);
	        $horas_usadas = Cita::where('fecha', '=', $date)->where('medico_id', '=', $medico->id)->lists('horario', 'id')->toArray();
	        $horas = array();
	        foreach ($horas_usadas as $hora) {
	            $horas[] = '["'.Carbon::createFromFormat('H:i', $hora)->toTimeString().'","'.Carbon::createFromFormat('H:i', $hora)->addMinutes(20)->toTimeString().'"]';          
	        }
	        $horas = implode(",",$horas);
	        //dd($horas);
			// returns a view and passes the view the list of articles and the original query.
		    return view('admin.citas.create')
		    	->with('pacientes', $pacientes)
		    	->with('medico', $medico)
		    	->with('date', $date)
		    	->with('todas_citas', $todas_citas)
		    	->with('horas', $horas);
	 }
	 public function NuevoPaciente($slug, $date, $rfc){
	 	$tipos = Tipo::all()->lists('tipo', 'id')->toArray();
        asort($tipos);
           
	 	return view('admin.pacientes.form_nuevo')->with('tipos', $tipos)->with('slug',$slug)->with('date',$date)->with('rfc',$rfc);
	 }
	 public function StorePaciente(PacientesRequest $request, $slug, $date)
    {
        $pacientes = new Paciente($request->all());
        $pacientes->fecha_nacimiento = fecha_ymd($request->fecha_nacimiento);
        $pacientes->save();

       	$pacientes = Paciente::where('rfc', '=', $request->rfc)->get();
		$pacientes->each(function($pacientes) {
          	$pacientes->tipo;
      	});

	   $medico = Medico::findBySlug($slug);
			$medico->especialidad;


        Flash::success('Paciente registrado con exito!');
        return view('admin.citas.create')->with('pacientes', $pacientes)->with('medico', $medico)->with('date', $date)->with('rfc', $request->rfc);
     	//return view('admin.citas.create')->with('rfc', $request-rfc)->with('medico', $medico)->with('date', $date);
    }  
}
