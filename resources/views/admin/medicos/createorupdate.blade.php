@extends('layouts.app')

@section('title', 'Alta de Medico')

@section('content')
@if(isset($medico))
	
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($medico, ['route' => ['medicos.update', $medico->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'medicos.store', 'method' => 'POST']) !!}
@endif
      @include('admin.medicos.form')

     {!! Form::submit($estado, ['class' => 'btn btn-primary']) !!}
  
    {!! Form::close() !!}

@endsection