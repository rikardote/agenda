<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CitasRequest;

use App\Cita;
use App\Especialidad;
use App\Medico;
use App\Paciente;
use Laracasts\Flash\Flash;

class CitasController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function show($slug){
		$medico = Medico::findBySlug($slug);
        $citas = Cita::orderBy('id', 'DESC')->where('medico_id', '=' , $medico->id)->get();
        $citas->each(function($citas) {
            $citas->paciente;
        });
	         
		return view('admin.citas.index')->with('medico', $medico)->with('citas', $citas);
           
	}
	public function nueva_cita($slug)
    {
    	$medico = Medico::findBySlug($slug);
		$medico->especialidad;

        
       
       return view('admin.citas.buscar_paciente')->with('medico', $medico);
        	
    }

    public function edit($slug,$id)
    {
        $cita = Cita::find($id);
        $cita->paciente;
       
        $medico = Medico::findBySlug($slug);
        $medico->especialidad;
       
        return view('admin.citas.edit')->with('cita', $cita)->with('medico', $medico);
        
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::find($id);
        $cita->fill($request->all());
        $cita->user_id = \Auth::user()->id;
        $cita->fecha = fecha_ymd($request->fecha);
        $cita->save();
        Flash::success('Cita editada con exito!');
        return redirect()->route('admin.citas.show', array('slug' => $request->slug));
 
    }

    public function store(CitasRequest $request)
    {
        $cita = new Cita($request->all());

        $cita->user_id = \Auth::user()->id;
        $cita->fecha = fecha_ymd($request->fecha);

        $cita->save();
        $slug = $request->slug;
 
        Flash::success('Cita registrada con exito!');
        return redirect()->route('admin.citas.show', array('slug' => $slug));
    }  

    public function destroy($slug, $id)
    {
        $cita = Cita::find($id);
        
        $cita->delete();
       
        Flash::error('La cita de ' . $cita->apellido_pat .' '. $cita->apellido_mat .' ha sido borrada con exito!');
        return redirect()->route('admin.citas.show', array('slug' => $slug));
    } 
    
	
    
}
