@extends('layouts.app')

	@section('title', 'Alta de Nuevo Paciente')

	@section('content')
		@if(isset($paciente))
			<?php $estado = 'Actualizar';  ?>
			{!! Form::model($paciente, ['route' => ['pacientes.update', $paciente->id], 'method' => 'PATCH', 'class'=>'form-inline']) !!}
		@else
			<?php $estado = 'Registrar';  ?>
			{!! Form::open(['route' => 'pacientes.store', 'method' => 'POST']) !!}
		@endif
		      @include('admin.pacientes.form')

		     {!! Form::submit($estado, ['class' => 'btn btn-primary']) !!}

		    {!! Form::close() !!}

	@endsection