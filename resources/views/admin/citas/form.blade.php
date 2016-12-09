<div class="form-group">
	{!! Form::label('primera_vez', 'Primera vez? (dejar en blanco para subsecuente)') !!}
	{!! Form::checkbox('primera_vez', '1',null, [
		'class' => 'form-control',
		'placeholder' => 'Selecciona..', 
		'readonly'
	]) !!}
</div>
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
{{ Form::hidden('slug', $medico->slug) }}

