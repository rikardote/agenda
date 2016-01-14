
<div class="form-group">
	{!! Form::label('fecha', 'Fecha') !!}
	
	{!! Form::text('fecha', fecha_dmy($cita->fecha), [
		
		'class' => 'form-control',
		'placeholder' => 'Selecciona la fecha', 
		'required',
		'id' => 'fecha_inicial'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('horario', 'Horario') !!}
	
	{!! Form::text('horario', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Ingresa un horario', 
		'required'
	]) !!}
</div>

{{ Form::hidden('medico_id', $medico->id) }}
{{ Form::hidden('paciente_id', $cita->paciente->id) }}
{{ Form::hidden('slug', $medico->slug) }}