@extends('layouts.app')

@section('title', 'Agregar Nuevo Horario')

@section('content')
@if(isset($horario))
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($horario, ['route' => ['horarios.update', $horario->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'horarios.store', 'method' => 'POST']) !!}
@endif
      @include('admin.horarios.form')

     {!! Form::submit($estado, ['class' => 'btn btn-primary']) !!}
  
    {!! Form::close() !!}

@endsection