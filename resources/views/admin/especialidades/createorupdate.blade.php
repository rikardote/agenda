@extends('layouts.app')

@section('title', 'Agregar Nueva Especialidad')

@section('content')
@if(isset($especialidad))
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($especialidad, ['route' => ['especialidades.update', $especialidad->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'especialidades.store', 'method' => 'POST']) !!}
@endif
      @include('admin.especialidades.form')
    {!! Form::submit($estado, ['class' => 'btn btn-primary']) !!}
  
    {!! Form::close() !!}

@endsection