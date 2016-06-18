<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistroRequest;
use App\Especialidad;
use App\Tipo;
use App\User;
use App\Medico;
use App\Userdoctor;
use Laracasts\Flash\Flash;



class RegistroMedicosController extends Controller
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
    	   $users_doctor = Userdoctor::all();
           $users_doctor->each(function($users_doctor) {
                $users_doctor->medico;
           });
           
    	   return view('admin.users_doctors.index')->with('users_doctor', $users_doctor);
      
    }
    public function create(){
        $medicos = Medico::all()->lists('Fullname', 'id')->toArray();
        
    	return view('admin.users_doctors.create')->with('medicos', $medicos);
    }
     public function edit($id){
     	$user = Userdoctor::find($id);
    	
    	return view('admin.users_doctors.edit')
    		->with('user', $user);
    }
    public function store(Request $request){
    	$user = new Userdoctor($request->all());
    	$user->password = bcrypt($request->password);
        $user->save();

        Flash::success('Usuario registrado con exito!');
        return redirect()->route('registrar_medicos.index');
    }
    public function update(Request $request, $id)
    {
        $user = Userdoctor::find($id);
        $user->fill($request->all());
        $user->password = bcrypt($request->password);

        $user->save();
		
        Flash::success('Usuario editado con exito!');
        return redirect()->route('registrar_medicos.index');
    }
    public function destroy($id)
    {
        $user = Userdoctor::find($id);
        $user->delete();

        Flash::error('El Medico ' . $user->Fullname . ' ha sido borrado con exito!');
        return redirect()->route('registrar_medicos.index');
    } 

}
