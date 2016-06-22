<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\HorariosRequest;

use App\Horario;
use Laracasts\Flash\Flash;

class HorariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
        if (!\Auth::user()->admin()) {
            return redirect()->route('agenda.index');
        }
    	$horarios = Horario::orderBy('entrada', 'ASC')->get();
    	return view('admin/horarios/index')->with('horarios', $horarios);
    }

    public function create()
    {
    	
        return view('admin.horarios.createorupdate');
    }

    public function edit($id)
    {
        $horario = Horario::find($id);
        
        return view('admin.horarios.createorupdate')->with('horario', $horario);
    }

    public function update(Request $request, $id)
    {
        $horario = Horario::find($id);
        $horario->fill($request->all());

        $horario->save();
        Flash::success('Horario editado con exito!');
        return redirect()->route('horarios.index');
    }

    public function store(HorariosRequest $request)
    {
        $horario = new Horario($request->all());
        $horario->save();

        Flash::success('Horario registrado con exito!');
        return redirect()->route('horarios.index');
    }  

    public function destroy($id)
    {
        $horario = Horario::find($id);
        $horario->delete();

        Flash::error('El Horario de ' . $horario->name . ' ha sido borrado con exito!');
        return redirect()->route('horarios.index');
    } 
}
