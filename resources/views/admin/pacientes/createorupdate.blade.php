@extends('layouts.app')

@section('title', 'Alta de Nuevo Paciente')

@section('content')
@if(isset($paciente))
	{!! Form::model($paciente, ['route' => ['pacientes.update', $paciente->id], 'method' => 'PATCH']) !!}
@else
	{!! Form::open(['route' => 'pacientes.store', 'method' => 'POST']) !!}
@endif
      @include('admin.pacientes.form')

     {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
  
    {!! Form::close() !!}

@endsection