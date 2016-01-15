<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Paciente;
use App\Medico;

use Carbon\Carbon;

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
}
