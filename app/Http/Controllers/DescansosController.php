<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Descanso;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Toastr;

class DescansosController extends Controller
{
    public function index()
    {	
    	$dias = Descanso::all();

    	return view('admin.descansos.index')->with('dias', $dias);
    }

    public function create()
    {
        return view('admin.descansos.createorupdate');
    }

    public function edit($id)
    {
        $dia = Descanso::find($id);
        return view('admin.descansos.createorupdate')->with('dia', $dia);
    }

    public function update(Request $request, $id)
    {
        $dia = Descanso::find($id);
        $dia->fill($request->all());
        $dia->fecha = fecha_ymd($request->fecha);
        $dia->save();
        Toastr::success('Dia de descanso editado con exito!');
        return redirect()->route('dianohabil.index');
    }

    public function store(Request $request)
    {
    	$dia = new Descanso($request->all());
        $dia->fecha = fecha_ymd($request->fecha);
        $dia->save();

        Toastr::success('Dia de descanso capturado con exito!');
        return redirect()->route('dianohabil.index');
    }  

    public function destroy($id)
    {
        $dia = Descanso::find($id);
        $dia->delete();

        Toastr::success('Dia de descanso borrado con exito!');
        return redirect()->route('dianohabil.index');
    } 
}
