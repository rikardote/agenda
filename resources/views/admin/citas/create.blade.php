@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')
<strong>Pacientes: </strong>
	<br>
	<br>
@if($pacientes->count() == 1)

	@foreach($pacientes as $paciente)
		{{ $paciente->nombres }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }} /{{ $paciente->tipo->code }}
		<br>

		{!! Form::open(['route' => ['admin.citas.store', $medico->slug, $date], 'method' => 'POST', 'class' => 'datepickerform']) !!}
			@include('admin.citas.form')
			{!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
	@endforeach

	
@else
@foreach($pacientes as $paciente)
 <a type="button" data-toggle="collapse" data-target="#{{$paciente->slug}}">
 		<li class="alert alert-info">
 			{{ $paciente->nombres }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }} /{{ $paciente->tipo->code }}	
 		</li>
 </a>

  <div id="{{$paciente->slug}}" class="collapse">

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


@include('admin.partials.form-modal', ['title'=>'Nuevo Paciente'])
@include('admin.partials.confirmation_modal', ['title'=>'Confirmation Modal'])

@endsection

@section('js')
	@foreach($pacientes as $paciente)
		 <script>
			$('#{{$paciente->rfc.$paciente->id}}').timepicker({ 
				'step': 20,
				'minTime': '<?php echo $entrada; ?>',
          		'maxTime': '<?php echo $salida; ?>',
			    'timeFormat': 'H:i',
			    'disableTextInput': true,
			    'disableTimeRanges': 
			    [
			    ['8am','10am'],
            	<?php echo $horas; ?>
		        ]
		        
			});
			
		</script> 
	@endforeach
	

@endsection