@extends('layouts.app')

@section('title', 'Alta de Medico')

@section('content')
@if(isset($medico))
	{!! Form::model($medico, ['route' => ['medicos.update', $medico->id], 'method' => 'PATCH']) !!}
@else
	{!! Form::open(['route' => 'medicos.store', 'method' => 'POST']) !!}
@endif
      @include('admin.medicos.form')

     {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
  
    {!! Form::close() !!}

@endsection