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
use App\Permiso;
use App\User;
use Carbon\Carbon;
use Toastr;

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

        $today = Carbon::today();
        $today = $today->year.'-'.$today->month.'-'.$today->day;
	
        $medico = Medico::findBySlug($slug);
        $permiso = Permiso::where('medico_id', '=', $medico->id)->where('fecha_inicio', '>=', $today)->first();
        
        $citas = Cita::orderBy('id', 'ASC')->where('medico_id', '=' , $medico->id)->where('fecha', '=', $date)->get();
        $citas->each(function($citas) {
            $citas->paciente;

        });
        $citas = $citas->sortBy('horario');
	       
        $todas_citas = Cita::getTotalCitas($medico->id, $date);

	    return view('admin.citas.index')
            ->with('medico', $medico)
            ->with('citas', $citas)
            ->with('date', $date)
            ->with('todas_citas', $todas_citas)
            ->with('permiso', $permiso);
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

        return view('admin.citas.edit')
            ->with('cita', $cita)
            ->with('medico', $medico)
            ->with('date', $date)
            ->with('todas_citas', $todas_citas)
            ->with('horas', $horas)
            ->with('entrada', $entrada)
            ->with('salida', $salida);
        
    }

    public function update(Request $request, $slug,$date,$id)
    {
        $cita = Cita::find($id);
        $cita->fill($request->all());
        $cita->capturado_por  = \Auth::user()->id;
        $cita->fecha = fecha_ymd($request->fecha);
        $medico = Medico::findBySlug($slug);
        
        $total_citas = Cita::getTotalCitasCount($medico->id, $cita->fecha);
        if($total_citas) {
            Toastr::error('Error al asignar Cita, Agenda del dia: '.fecha_dmy($cita->fecha).' llena');
            return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $request->date]);    
        }
        else{
            $cita->save();            
        }
               
        Toastr::success('Cita actualizada exitosamente');
        return redirect()->route('admin.citas.show', ['slug' => $request->slug, 'date' => $date]);
 
    }

    public function store(CitasRequest $request, $slug, $date)
    {

        $cita = new Cita($request->all());
        $cita->fecha = fecha_ymd($request->fecha);
        $cita->capturado_por = \Auth::user()->id;

        $cita->folio = getRandomeStr(4);

        $medico = Medico::findBySlug($slug);
        $total_citas = Cita::getTotalCitasCount($medico->id, $cita->fecha);
        if($total_citas) {
            Toastr::error('Error al asignar Cita, Agenda del dia: '.fecha_dmy($cita->fecha).' llena');
            return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $request->date]);    
        }
        else{
            $cita->save();            
        }


        //Flash::success('Cita registrada con exito!');
        Toastr::success('Cita Agendada con exito');
        return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $request->date]);
    }  
 
    public function destroy($slug, $date, $id)
    {
        $cita = Cita::find($id);

        $cita->delete();
       
        Toastr::error('Cita borrada exitosamente');
        return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $date]);
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
        Toastr::success('Cita Concretada');
        return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $date]);
       
    }
    
	
    
}
