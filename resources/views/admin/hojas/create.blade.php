<?php use Carbon\Carbon; // . ' | '.$anos 
?>
@extends('layouts.doctores')

@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/jQuery-Tags-Input/jquery.tagsinput.min.css') }}">
@endsection

@section('title', 'Hoja medica del paciente: '. $paciente->fullname . '  ' . getForaneo($cita->paciente->foraneo_id)  )

@section('content')
	@if($cita->concretada)
	
		<?php $estado = 'Actualizar';  ?>
		{!! Form::model($cita, ['route' => ['custom.hojas.update', $cita->id], 'method' => 'PATCH']) !!}
	@else
		<?php $estado = 'Registrar';  ?>
		{!! Form::open(['route' => 'hojas.store', 'method' => 'POST']) !!}
	@endif
	      @include('admin.hojas._form')
	<div align="right">
	     {!! Form::submit($estado, ['class' => 'btn btn-success']) !!}
	 </div>
	    {!! Form::close() !!}

@endsection

@section('js')
	<script src="{{ asset('plugins/jQuery-Tags-Input/jquery.tagsinput.min.js') }}"></script>
	<script>
	    $('#tags').tagsInput({
	       'height':'90px',
		   'width':'286px',
		   'interactive':true,
		   'defaultText':'Folio',
		   'delimiter': [' '],   // Or a string with a single delimiter. Ex: ';'
		   'removeWithBackspace' : true,
		   'minChars' : 0,
		   'maxChars' : 0, // if not provided there is no limit
		   'placeholderColor' : '#666666'
	    });
	</script>
@endsection