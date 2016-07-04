@if(isset($horario))
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($horario, ['route' => ['horarios.update', $horario->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'horarios.store', 'method' => 'POST']) !!}
@endif
      @include('admin.horarios.form')
<div align="right">
     {!! Form::submit($estado, ['class' => 'btn btn-success']) !!}
</div>  
    {!! Form::close() !!}

<script>
	$('#entrada').timepicker({
		'minTime': '7:00am',
	    'maxTime': '17:00pm',
	    'timeFormat': 'H:i'

	});
	$('#salida').timepicker({
		'minTime': '12:00pm',
	    'maxTime': '22:00pm',
	    'timeFormat': 'H:i'
	});
</script>