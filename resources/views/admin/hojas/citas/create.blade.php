@extends('layouts.doctores')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')

<strong>Pacientes: </strong>
	<br>
	<br>
@if($pacientes->count() == 1)

	@foreach($pacientes as $paciente)
		{{ $paciente->nombres }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }} /{{ $paciente->tipo->code }}
		<br>

		{!! Form::open(['route' => ['medicos.cita.store', $date], 'method' => 'POST', 'class' => 'datepickerform']) !!}
			@include('admin.hojas.citas.form')
			{!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
	@endforeach

	
@else
@foreach($pacientes as $paciente)
 <a type="button" data-toggle="collapse" data-target="#{{$paciente->slug}}">
      <li class="alert alert-warning no-bullet">
 			  {{ $paciente->nombres }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }} /{{ $paciente->tipo->code }}	
 		 </li>
 </a>

  <div id="{{$paciente->slug}}" class="collapse">

   {!! Form::open(['route' => ['medicos.cita.store', $date], 'method' => 'POST', 'class' => 'datepickerform']) !!}
			@include('admin.hojas.citas.form')
      <br>
			{!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
  </div>

@endforeach
 <hr>
 <br>

@endif



@endsection

@section('js')
	@foreach($pacientes as $paciente)
		 <script>
		 $.datepicker.setDefaults($.datepicker.regional['es-MX']);
  var dates = <?php echo json_encode($todas_citas); ?>;
    $( "#{{$paciente->id}}" ).datepicker({
      dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        firstDay: 1,
        defaultDate: '{{ $date }}',
        
        beforeShowDay: function(date){
            var y = date.getFullYear().toString(); // get full year
            var m = (date.getMonth() + 1).toString(); // get month.
            var d = date.getDate().toString(); // get Day
            if(m.length == 1){ m = '0' + m; } // append zero(0) if single digit
            if(d.length == 1){ d = '0' + d; } // append zero(0) if single digit
            var currDate = y+'-'+m+'-'+d;
            if(dates.indexOf(currDate) >= 0){
              return [true, "ui-highlight"];  
            }else{
              return [true];
            }
         }
       
  });
	$('#{{$paciente->rfc.$paciente->id}}').timepicker({ 
          'step': 20,
          'minTime': '<?php echo $entrada; ?>',
          'maxTime': '<?php echo $salida; ?>',
          'timeFormat': 'H:i',
          'disableTextInput': true,
          'disableTimeRanges': 
          [
              <?php echo $horas; ?>
          ]
            
    });
			
		</script> 
	@endforeach
	

@endsection