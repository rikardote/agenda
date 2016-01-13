@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')
	<a href="{{ route('citas.nueva_cita', $medico->slug) }}" class="btn btn-info">Nueva Cita</a>
	
	


@endsection