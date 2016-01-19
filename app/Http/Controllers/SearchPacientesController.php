<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PacientesRequest;
use App\Paciente;
use App\Medico;
use App\Tipo;
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
		  	$paciente = Paciente::where('rfc', '=', $query)->first();
		   	$medico = Medico::findBySlug($slug);
			$medico->especialidad;

			// returns a view and passes the view the list of articles and the original query.
		    return view('admin.citas.create')->with('paciente', $paciente)->with('medico', $medico)->with('date', $date);
	 }
	 public function NuevoPaciente($slug, $date, $rfc){
	 	$tipos = Tipo::all()->lists('tipo', 'id')->toArray();
        asort($tipos);
      // $rfc = $_GET["rfc"];
       
	 	return view('admin.pacientes.form_nuevo')->with('tipos', $tipos)->with('slug',$slug)->with('date',$date)->with('rfc',$rfc);
	 }
	 public function StorePaciente(PacientesRequest $request, $slug, $date)
    {
        $paciente = new Paciente($request->all());
        $paciente->save();
        
        $medico = Medico::findBySlug($slug);
		$medico->especialidad;

        Flash::success('Paciente registrado con exito!');
     	return view('admin.citas.create')->with('paciente', $paciente)->with('medico', $medico)->with('date', $date);
    }  
}
