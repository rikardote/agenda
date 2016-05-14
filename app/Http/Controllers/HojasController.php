<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cita;
use App\Medico;
use App\Hoja;
use App\Cie;
use Carbon\Carbon;
use App\Paciente;
use App\Http\Requests\CitasRequest;
use Toastr;

class HojasController extends Controller
{
   function __construct()
   {
    $this->middleware('auth:doctors');
   }
	public function index()
	{
		$today = Carbon::today();
        $tomorrow = Carbon::tomorrow();

		$fecha = $today->year.'-'.$today->month.'-'.$today->day;

    	$citas = Cita::where('fecha', '=', $today)->where('medico_id', '=', \Auth::guard('doctors')->user()->doctor_id)->get();	
    	$citas->each(function($citas) {
            $citas->paciente;
        });
      
        //$citas = usort($citas, create_function('$a, $b', 'return strcmp($a->horario, $b->horario);'));
        $citas = $citas->sortBy('horario');
        $medico = Medico::find(\Auth::guard('doctors')->user()->doctor_id);

    	return view('admin.hojas.index')
            ->with('citas', $citas)
            ->with('fecha', $fecha)
            ->with('medico', $medico);

	}
    public function custom_create($paciente_id, $medico_id, $cita_id)
    {
        $medico = Medico::find($medico_id);
        $paciente = Paciente::find($paciente_id);
        return view('admin.hojas.create')
            ->with('paciente', $paciente)
            ->with('medico', $medico)
            ->with('cita_id', $cita_id);
            
    }
    public function store(Request $request)
    {        
        $hoja = new Hoja($request->all());
        $cie = Cie::where('code', '=', $request->codigo_cie_id)->first();
        $hoja->codigo_cie_id = $cie->id;
        $hoja->save();

        $cita = Cita::where('id', '=', $request->cita_id)->first();
        $cita->concretada = 1;
        /*$total_citas = Cita::getTotalCitasCount($request->medico_id, $cita->fecha);
        if($total_citas) {
            Toastr::error('Error al asignar Cita, Agenda del dia: '.fecha_dmy($cita->fecha).' llena');
            return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $request->date]);    
        }
        else{
            $cita->save();            
        }*/
        $cita->save();   
        Toastr::success('Hoja medica del paciente guardada con exito!!');
        return redirect()->route('hojas.index');
    }
    public function avanzar($fecha)
    {
        $today = Carbon::parse($fecha);
        do {
            $today->addDay(1);
        }while ($today->isWeekend());
        
        $fecha = $today->year.'-'.$today->month.'-'.$today->day;

        $citas = Cita::where('fecha', '=', $today)->where('medico_id', '=', \Auth::guard('doctors')->user()->doctor_id)->get(); 
        $citas->each(function($citas) {
            $citas->paciente;
        });
        $citas = $citas->sortBy('horario');
        $medico = Medico::find(\Auth::guard('doctors')->user()->doctor_id);

        return view('admin.hojas.index')
            ->with('citas', $citas)
            ->with('fecha', $fecha)
            ->with('medico', $medico);

    }
    public function citas_editar($medico_id,$date,$cita_id)
    {
        $cita = Cita::find($cita_id);
        $cita->paciente;

        $medico = Medico::find($medico_id);
        $medico->especialidad;
       
        $todas_citas = Cita::getTotalCitas($medico_id, $date);

        return view('admin.hojas.citas_edit')->with('cita', $cita)->with('medico', $medico)->with('date', $date)->with('todas_citas', $todas_citas);
        
    }
    public function update(Request $request, $medico_id,$date,$cita_id)
    {
        $cita = Cita::find($cita_id);
        $cita->fill($request->all());
        
        $cita->fecha = fecha_ymd($request->fecha);

        $total_citas = Cita::getTotalCitasCount($medico_id, $cita->fecha);
        if($total_citas) {
            Toastr::error('Error al asignar Cita, Agenda del dia: '.fecha_dmy($cita->fecha).' llena');
            return redirect()->route('hojas.index');    
        }
        else{
            $cita->save();            
        }
        
        Toastr::success('Cita actualizada exitosamente');
        return redirect()->route('hojas.index');
 
    }
    public function nueva_cita()
    {
        return view('admin.hojas.citas.buscar_paciente');
    }
    public function search_paciente(Request $request)
    {
            // Gets the query string from our form submission 
            $query = $request->rfc;
            // Returns an array of articles that have the query string located somewhere within 
            // our articles titles. Paginates them so we can break up lots of search results.
            $pacientes = Paciente::where('rfc', '=', $query)->get();
            $pacientes->each(function($pacientes) {
              $pacientes->tipo;
            });
            $medico = Medico::find(\Auth::guard('doctors')->user()->doctor_id);
            $medico->especialidad;
            $today = Carbon::today();
            $date = $today->year.'-'.$today->month.'-'.$today->day;
            $todas_citas = Cita::getTotalCitas($medico->id, $date);

            // returns a view and passes the view the list of articles and the original query.
            return view('admin.hojas.citas.create')->with('pacientes', $pacientes)->with('medico', $medico)->with('date', $date)->with('todas_citas', $todas_citas);
    }
    public function cita_store(CitasRequest $request)
    {

        $cita = new Cita($request->all());

        $cita->fecha = fecha_ymd($request->fecha);
        //$cita->capturado_por = \Auth::guard('doctors')->user()->doctor_id;

        $medico = Medico::find(\Auth::guard('doctors')->user()->doctor_id);
        $total_citas = Cita::getTotalCitasCount($medico->id, $cita->fecha);
        if($total_citas) {
            Toastr::error('Error al asignar Cita, Agenda del dia: '.fecha_dmy($cita->fecha).' llena');
            return redirect()->route('hojas.index');    
        }
        else{
            $cita->save();            
        }

        $fecha = Carbon::parse($cita->fecha)->subDay(1);;
        //Flash::success('Cita registrada con exito!');
        Toastr::success('Cita Agendada con exito');
        return redirect()->route('custom.hojas.avanzar', ['fecha' => $fecha]);  
    }  


	
}
