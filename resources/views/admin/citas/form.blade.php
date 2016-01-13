<div class="form-group">
	{!! Form::label('paciente_id', 'Paciente') !!}
	{!! Form::select('paciente_id', $pacientes, null, [
		'class' => 'form-control',
		'placeholder' => 'Selecciona un Paciente', 
		'required'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('medico_id', 'Medico') !!}
	{!! Form::select('medico_id', $medico->id, null, [
		'class' => 'form-control',
		'placeholder' => 'Selecciona un horario', 
		'required'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('fecha', 'Fecha') !!}
	
	{!! Form::text('fecha', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Apellido Paterno', 
		'required'
	]) !!}
</div>