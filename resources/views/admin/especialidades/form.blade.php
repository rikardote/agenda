<div class="form-group">
	{!! Form::label('name', 'Nombre') !!}
	
	{!! Form::text('name', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Nombre de la Especialidad', 
		'required'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('consultorio_id', 'Consultorio') !!}
	{!! Form::select('consultorio_id', $consultorios, null, [
		'class' => 'form-control', 
		'placeholder' => 'Selecciona un Consultorio', 
		'required'
	]) !!}
</div>
