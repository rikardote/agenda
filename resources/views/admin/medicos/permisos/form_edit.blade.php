<div class="form-group">
	{!! Form::label('medico_id', 'Medico') !!}
	{!! Form::text('medico_id', $permiso->medico->fullname,[
		'class' => 'form-control',
		'readonly'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('fecha_inicio', 'Fecha Inicial') !!}
	{!! Form::text('fecha_inicio', fecha_dmy($permiso->fecha_inicio), [
		'id' => 'fecha_inicio',
		'class' => 'form-control',
		'placeholder' => 'Selecciona la fecha', 
		'required'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('fecha_final', 'Fecha Final') !!}
	
	{!! Form::text('fecha_final', fecha_dmy($permiso->fecha_final), [
		'id' => 'fecha_final',
		'class' => 'form-control',
		'placeholder' => 'Ingresa un horario', 
		'required'
	]) !!}
</div>