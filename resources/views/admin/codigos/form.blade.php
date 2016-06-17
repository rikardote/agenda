<div class="form-group">
	{!! Form::label('code', 'Codigo') !!}
	
	{!! Form::text('code', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Codigo', 
		'required'
	]) !!}
	{!! Form::label('description', 'Descripcion') !!}
	{!! Form::text('description', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Descripcion', 
		'required'
	]) !!}
</div>
