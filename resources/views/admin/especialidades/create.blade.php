@extends('layouts.app')

@section('title', 'Agregar Nueva Especialidad')

@section('content')

	{!! Form::model($especialidades, ['route' => 'especialidades.store', 'method' => 'POST']) !!}
       
      @include('admin.especialidades.form')

     {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
  
    {!! Form::close() !!}

@endsection