@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')
@if($paciente)
	Paciente: 
	<br>
	<br>
	{{ $paciente->nombres }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }}
	<br>
	<br>
	{!! Form::open(['route' => 'citas.store', 'method' => 'POST']) !!}
		@include('admin.citas.form')
		{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@else
	No se encontraron datos con ese RFC
@endif
@endsection