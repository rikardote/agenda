<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Especialidad;
use App\Medico;
use App\User;

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
        $user = User::find(\Auth::user()->id);
        $user_espe = $user->especialidades;
        $user_espe = $user_espe->sortBy('name');
        
        return view('admin.agenda.index')->with('especialidades', $user_espe);
    }

    public function show($slug)
    {
                
        $especialidad = Especialidad::SearchEspecialidad($slug)->first();
        $medicos = $especialidad->medicos()->get();
        
        $medicos->each(function($medicos) {
            $medicos->especialidad;
            $medicos->horario;
            
        });
        $date = date('Y-m-d');

        return view('admin.agenda.show')->with('medicos', $medicos)->with('date', $date);
    }
}
