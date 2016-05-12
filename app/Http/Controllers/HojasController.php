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
        $cita->save();
        Toastr::success('Hoja medica del paciente guardada con exito!!');
        return redirect()->route('hojas.index');
    }
    public function avanzar($fecha)
    {
        $today = Carbon::parse($fecha)->addDay(1);
        
        $fecha = $today->year.'-'.$today->month.'-'.$today->day;

        $citas = Cita::where('fecha', '=', $today)->where('medico_id', '=', \Auth::guard('doctors')->user()->doctor_id)->get(); 
        $citas->each(function($citas) {
            $citas->paciente;
        });
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
       
        return view('admin.hojas.citas_edit')->with('cita', $cita)->with('medico', $medico)->with('date', $date);
        
    }
    public function update(Request $request, $medico_id,$date,$cita_id)
    {
        $cita = Cita::find($cita_id);
        $cita->fill($request->all());
        
        $cita->fecha = fecha_ymd($request->fecha);
        $cita->save();
        
        Toastr::success('Cita actualizada exitosamente');
        return redirect()->route('hojas');
 
    }
	
}
