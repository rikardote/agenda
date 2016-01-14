<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Especialidad;
use App\Medico;

class AgendaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $especialidades = Especialidad::orderBy('name', 'ASC')->get();
        //$especialidad = $especialidades->name;
       // dd($especialidad);
   
        return view('admin.agenda.index')->with('especialidades', $especialidades);
    }

    public function show($slug)
    {
                
        $especialidad = Especialidad::SearchEspecialidad($slug)->first();
        $medicos = $especialidad->medicos()->get();
        
        $medicos->each(function($medicos) {
            $medicos->especialidad;
            $medicos->horario;
            
        });

        return view('admin.agenda.show')->with('medicos', $medicos);
    }
}
