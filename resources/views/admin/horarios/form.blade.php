<div class="form-group">
	{!! Form::label('entrada', 'Horario de Entrada') !!}
	
	{!! Form::text('entrada', null, [
		'class' => 'form-control',
		'placeholder' => 'Horario de Entrada', 
		'id' => 'entrada',
		'required',
		
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('salida', 'Horario de Salida') !!}
	
	{!! Form::text('salida', null, [
		'class' => 'form-control',
		'placeholder' => 'Horario de Salida', 
		'required',
		'id' => 'salida'
	]) !!}
</div>
