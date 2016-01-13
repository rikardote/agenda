@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content').
@if(isset($medico))
{!! Form::model($medico, ['route' => ['medicos.update', $medico->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'medicos.store', 'method' => 'POST']) !!}
@endif
      @include('admin.citas.form')

     {!! Form::submit($estado, ['class' => 'btn btn-primary']) !!}
  
    {!! Form::close() !!}
@endsection