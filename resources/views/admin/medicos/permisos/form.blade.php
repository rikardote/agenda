<div class="form-group">
	{!! Form::label('medico_id', 'Medico') !!}
	{!! Form::select('medico_id', $medicos, null, [
		'class' => 'form-control',
		'placeholder' => 'Selecciona un Medico', 
		'required'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('fecha_inicio', 'Fecha Inicial') !!}
	{!! Form::text('fecha_inicio', null, [
		'id' => 'fecha_inicio',
		'class' => 'form-control',
		'placeholder' => 'Selecciona la fecha', 
		'required'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('fecha_final', 'Fecha Final') !!}
	
	{!! Form::text('fecha_final', null, [
		'id' => 'fecha_final',
		'class' => 'form-control',
		'placeholder' => 'Ingresa un horario', 
		'required'
	]) !!}
</div>