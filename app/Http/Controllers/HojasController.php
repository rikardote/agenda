<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cita;
use App\Medico;
use Carbon\Carbon;
use App\Paciente;
class HojasController extends Controller
{
	public function index()
	{
		$today = Carbon::today();
		$today = $today->year.'-'.$today->month.'-'.$today->day;
    	$citas = Cita::where('fecha', '=', $today)->get();	
    	$citas->each(function($citas) {
            $citas->paciente;
        });
        $medico = Medico::find(1);
    	
    	return view('admin.hojas.index')
            ->with('citas', $citas)
            ->with('today', $today)
            ->with('medico', $medico);
	}
    public function custom_create($paciente_id, $medico_id)
    {
        $medico = Medico::find($medico_id);
        $paciente = Paciente::find($paciente_id);
        return view('admin.hojas.create')
            ->with('paciente', $paciente)
            ->with('medico', $medico);
    }
	
}
