@extends('layouts.app')

@section('title', 'Agregar Nuevo Horario')

@section('content')
@if(isset($horario))
	{!! Form::model($horario, ['route' => ['horarios.update', $horario->id], 'method' => 'PATCH']) !!}
@else
	{!! Form::open(['route' => 'horarios.store', 'method' => 'POST']) !!}
@endif
      @include('admin.horarios.form')

     {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
  
    {!! Form::close() !!}

@endsection