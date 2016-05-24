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
use App\Permiso;
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
		if (isset($_GET["date"])) {
            $date = $_GET["date"];
           
        }else{
            $date = Carbon::today();
            $date = $date->year.'-'.$date->month.'-'.$date->day;     
        }
        
        $today = Carbon::today();
        $today = $today->year.'-'.$today->month.'-'.$today->day;
    
        $medico = Medico::find(\Auth::guard('doctors')->user()->doctor_id);
        $permiso = Permiso::where('medico_id', '=', $medico->id)->where('fecha_inicio', '>=', $today)->first();

        $citas = Cita::orderBy('id', 'ASC')->where('medico_id', '=' , $medico->id)->where('fecha', '=', $date)->get();
        $citas->each(function($citas) {
            $citas->paciente;

        });
        $citas = $citas->sortBy('horario');
           
        $todas_citas = Cita::getTotalCitas($medico->id, $date);

        
        return view('admin.hojas.index')
            ->with('medico', $medico)
            ->with('citas', $citas)
            ->with('date', $date)
            ->with('todas_citas', $todas_citas)
            ->with('permiso', $permiso);
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
    
    public function citas_editar($medico_id,$date,$cita_id)
    {
        $cita = Cita::find($cita_id);
        $cita->paciente;

        $medico = Medico::find($medico_id);
        $medico->especialidad;
        $medico->horario;
        $todas_citas = Cita::getTotalCitas($medico_id, $date);
        $horas_usadas = Cita::where('fecha', '=', $date)->where('medico_id', '=', $medico->id)->lists('horario', 'id')->toArray();
        $horas = array();

        foreach ($horas_usadas as $hora) {
            $horas[] = '["'.Carbon::createFromFormat('H:i', $hora)->toTimeString().'","'.Carbon::createFromFormat('H:i', $hora)->addMinutes(20)->toTimeString().'"]';          
        }
        $horas = implode(",",$horas);
        $entrada = $medico->horario->entrada;
        $salida = $medico->horario->salida;

        return view('admin.hojas.citas_edit')->with('cita', $cita)
            ->with('medico', $medico)
            ->with('date', $date)
            ->with('todas_citas', $todas_citas)
            ->with('horas', $horas)
            ->with('entrada', $entrada)
            ->with('salida', $salida);
        
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

    public function nueva_cita($date)
    {
        $medico = Medico::find(\Auth::guard('doctors')->user()->doctor_id);
        $medico->especialidad;


        return view('admin.hojas.citas.buscar_paciente')->with('medico', $medico)->with('date', $date);

    }
    public function nueva_cita_create($paciente_id, $medico_id)
    {
        $horas_usadas = Cita::where('fecha', '=', $request->fecha)->where('medico_id', '=', $request->medico_id)->lists('horario', 'id')->toArray();
        $horas = array();

        foreach ($horas_usadas as $hora) {
            $horas[] = '["'.Carbon::createFromFormat('H:i', $hora)->toTimeString().'","'.Carbon::createFromFormat('H:i', $hora)->addMinutes(20)->toTimeString().'"]';          
        }
        $horas = implode(",",$horas);
        return view('admin.hojas.citas.form_citas')->with('paciente_id', $paciente_id)->with('medico_id', $medico_id);
    }
    public function search_paciente(Request $request, $date)
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
            return view('admin.hojas.citas.create')
                ->with('pacientes', $pacientes)
                ->with('medico', $medico)
                ->with('date', $date)
                ->with('todas_citas', $todas_citas)
                ->with('horas', $horas)
                ->with('entrada', $entrada)
                ->with('salida', $salida);
    }
    public function cita_store(CitasRequest $request, $date)
    {

        $cita = new Cita($request->all());
        $medico = Medico::find(\Auth::guard('doctors')->user()->doctor_id);
        $cita->fecha = fecha_ymd($request->fecha);
        $cita->capturado_por = 1;

        $medico = Medico::find(\Auth::guard('doctors')->user()->doctor_id);
        $total_citas = Cita::getTotalCitasCount($medico->id, $cita->fecha);
        if($total_citas) {
            Toastr::error('Error al asignar Cita, Agenda del dia: '.fecha_dmy($cita->fecha).' llena');
            return redirect()->route('hojas.index', ['date' => $request->date]);    
        }
        else{
            $cita->save();            
        }


        //Flash::success('Cita registrada con exito!');
        Toastr::success('Cita Agendada con exito');
        return redirect()->route('hojas.index', ['date' => $request->date]);
    }  
   /* public function getHoras(Request $request)
    {
        $horas_usadas = Cita::where('fecha', '=', $request->fecha)->where('medico_id', '=', $request->medico_id)->lists('horario', 'id')->toArray();
        $horas = array();

        foreach ($horas_usadas as $hora) {
            $horas[] = '["'.Carbon::createFromFormat('H:i', $hora)->toTimeString().'","'.Carbon::createFromFormat('H:i', $hora)->addMinutes(20)->toTimeString().'"]';          
        }
        $horas = implode(",",$horas);
        
        if ($request->ajax()) {
            return response()->json(
                $horas, 200);
        }
    }
*/


	
}
