
<div class="form-group">
	{!! Form::label('fecha', 'Fecha') !!}
	{!! Form::text('fecha', fecha_dmy($date), [
		'class' => 'form-control',
		'placeholder' => 'Selecciona la fecha', 
		'readonly'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('horario', 'Horario') !!}
	
	{!! Form::text('horario', null, [
		'id' => $paciente->rfc.$paciente->id,
		'class' => 'form-control',
		'placeholder' => 'Ingresa un horario', 
		'required'
	]) !!}
</div>

{{ Form::hidden('medico_id', $medico->id) }}
{{ Form::hidden('paciente_id', $paciente->id) }}

