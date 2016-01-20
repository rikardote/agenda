@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')
<strong>Pacientes: </strong>
	<br>
	<br>
@if($pacientes->count() == 1)

	@foreach($pacientes as $paciente)
		{{ $paciente->nombres }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }}
		<br>
		<br>
		{!! Form::open(['route' => ['admin.citas.store', $medico->slug, $date], 'method' => 'POST', 'class' => 'datepickerform']) !!}
			@include('admin.citas.form')
			{!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
	@endforeach

	
@else
@foreach($pacientes as $paciente)
 <a type="button" data-toggle="collapse" data-target="#{{$paciente->tipo->tipo}}">
 	<ul>
 		<li>
 			{{ $paciente->nombres }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }} /{{ $paciente->tipo->tipo }}	
 		</li>
 	</ul>
 </a>
  <div id="{{$paciente->tipo->tipo}}" class="collapse">

   {!! Form::open(['route' => ['admin.citas.store', $medico->slug, $date], 'method' => 'POST', 'class' => 'datepickerform']) !!}
			@include('admin.citas.form')
			{!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
  </div>

@endforeach
 <hr>
 <br>

@endif

@if(isset($_GET['rfc']))
	 <br>
	 <div class="pull pull-right">
		 <a data-url="{{ route('admin.pacientes.create', [$medico->slug , $date, $_GET['rfc']]) }}" class="load-form-modal fa fa-pencil " data-toggle ="modal" data-target='#form-modal'>
			NUEVO PACIENTE CON RFC: {{strtoupper($_GET['rfc'])}}?
		 </a> 
	 </div>
 @else
 <br>
  <div class="pull pull-right">
	 <a data-url="{{ route('admin.pacientes.create', [$medico->slug , $date, $rfc]) }}" class="load-form-modal fa fa-pencil" data-toggle ="modal" data-target='#form-modal'>
	
		NUEVO PACIENTE CON RFC: {{strtoupper($rfc)}}?
	 </a> 
	</div>
 @endif

@include('admin.partials.form-modal', ['title'=>'Form Modal'])
@include('admin.partials.confirmation_modal', ['title'=>'Confirmation Modal'])

@endsection

@section('js')
	<script type="text/javascript">
	  $(function() {
	    $( "#fecha_inicial" ).datepicker();
	  });
	 </script>
	 <script>
	$.datepicker.setDefaults($.datepicker.regional['es-MX']);
	$('#fecha_inicial').datepicker({
	    dateFormat: 'dd-mm-yy',
	    changeMonth: true,
	    changeYear: true,
	    firstDay: 1,
	    
	    
	});

	</script> 

@endsection