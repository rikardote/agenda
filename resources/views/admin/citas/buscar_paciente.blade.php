@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')
{!! Form::open(['method'=>'GET','url'=>'citas/'.$medico->slug.'/nueva_cita/paciente','role'=>'search'])  !!}

<div class="input-group ">
    <input type="text" class="form-control" name="rfc" placeholder="Buscar paciente por RFC">
    
        <button class="btn btn-default-sm" type="submit">Ok</button>
   
</div>
{!! Form::close() !!}
	


@endsection