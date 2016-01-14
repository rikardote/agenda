@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')
@if($cita)
	Paciente: 
	<br>
	<br>
	{{ $cita->paciente->nombres }} {{ $cita->paciente->apellido_pat }} {{ $cita->paciente->apellido_mat }}
	<br>
	<br>
	{!!  Form::model($cita, ['route' => ['citas.update', $cita->id], 'method' => 'PATCH']) !!}
		@include('admin.citas.edit_form')
		{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@else
	No se encontraron datos con ese RFC
@endif
@endsection