@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')

Asignar cita para el {{ \Carbon\Carbon::createFromFormat('Y-m-d', $date)->formatLocalized('%A %d %B %Y') }}
{!! Form::open(['method'=>'GET','url'=>'citas/'.$medico->slug.'/'.$date.'/nueva_cita/paciente','role'=>'search'])  !!}

<div class="input-group ">
    <input type="text" class="form-control" name="rfc" placeholder="Buscar paciente por RFC">
    <input type="hidden" date={{$date}}>
    
        <button class="btn btn-default-sm" type="submit">Ok</button>
   
</div>
{!! Form::close() !!}
	


@endsection