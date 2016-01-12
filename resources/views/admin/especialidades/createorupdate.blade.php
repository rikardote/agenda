@extends('layouts.app')

@section('title', 'Agregar Nueva Especialidad')

@section('content')
@if(isset($especialidad))
	{!! Form::model($especialidad, ['route' => ['especialidades.update', $especialidad->id], 'method' => 'PATCH']) !!}
@else
	{!! Form::open(['route' => 'especialidades.store', 'method' => 'POST']) !!}
@endif
      @include('admin.especialidades.form')

     {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
  
    {!! Form::close() !!}

@endsection