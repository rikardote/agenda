<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CitasRequest;
use Vsmoraes\Pdf\Pdf;
use App\Cita;
use App\Especialidad;
use App\Medico;
use App\Paciente;
use Laracasts\Flash\Flash;
use App\User;
use Carbon\Carbon;


class CitasController extends Controller
{
	private $pdf;
	public function __construct(Pdf $pdf)
    {
        $this->middleware('auth');
        setlocale(LC_ALL,"es_MX.utf8");
        $this->pdf = $pdf;
    }

	public function show($slug,$date){
        
        if (isset($_GET["date"])) {
            $date = $_GET["date"];
        }
        $date = fecha_ymd($date);  

		$medico = Medico::findBySlug($slug);
        $citas = Cita::orderBy('id', 'ASC')->where('medico_id', '=' , $medico->id)->where('fecha', '=', $date)->get();
        $citas->each(function($citas) {
            $citas->paciente;

        });
	       
       
		return view('admin.citas.index')->with('medico', $medico)->with('citas', $citas)->with('date', $date);
       /* 
        $html = view('welcome')->with('medico', $medico)->with('citas', $citas)->with('date', $date)->render();

        return $this->pdf
            ->load($html)
            ->download();   
       */
	}

	public function nueva_cita($slug, $date)
    {
    	$medico = Medico::findBySlug($slug);
		$medico->especialidad;

        return view('admin.citas.buscar_paciente')->with('medico', $medico)->with('date', $date);
        	
    }

    public function edit($slug,$date,$id)
    {
        $cita = Cita::find($id);
        $cita->paciente;
       
        $medico = Medico::findBySlug($slug);
        $medico->especialidad;
       
        return view('admin.citas.edit')->with('cita', $cita)->with('medico', $medico)->with('date', $date);
        
    }

    public function update(Request $request, $slug,$date,$id)
    {
        $cita = Cita::find($id);
        $cita->fill($request->all());
        $cita->user_id = \Auth::user()->id;
        $cita->fecha = fecha_ymd($request->fecha);
        $cita->save();
        Flash::success('Cita editada con exito!');
        return redirect()->route('admin.citas.show', array('slug' => $request->slug, 'date' => $date));
 
    }

    public function store(CitasRequest $request, $slug, $date)
    {

        $cita = new Cita($request->all());

        $cita->fecha = fecha_ymd($request->fecha);
        $cita->capturado_por = \Auth::user()->id;
        $cita->save();

        Flash::success('Cita registrada con exito!');
        return redirect()->route('admin.citas.show', array('slug' => $slug, 'date' => $request->date));
    }  
 
    public function destroy($slug, $date, $id)
    {
        $cita = Cita::find($id);

        $cita->delete();
       
        Flash::error('La cita ha sido borrada con exito!');
        return redirect()->route('admin.citas.show', array('slug' => $slug, 'date' => $date));
    } 
    public function concretada($slug,$date,$id)
    {
    	$cita = Cita::find($id);
   		if ($cita->concretada == 1) {
   			$cita->concretada = 0;
   		}
   		else{
   			$cita->concretada = 1;
   		}

       	$cita->save();
       
        $medico = Medico::findBySlug($slug);
        $medico->especialidad;
       
        return redirect()->route('admin.citas.show', array('slug' => $slug, 'date' => $date));
    }
    
	
    
}
