<div class="form-group">
{!! Form::open(['route' => 'registrar_medicos.store', 'method' => 'POST']) !!}
 
 <div class="form-group">
	{!! Form::label('doctor_id', 'Medico') !!}
	{!! Form::select('doctor_id', $medicos, null, [
    'id' => 'doctor_id',
    'class' => 'form-control',
    'placeholder' => 'Selecciona una Medico', 
    'required'
  ]) !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'Email') !!}
	
	{!! Form::text('email', null, [
		'autocomplete' => 'false',		
		'class' => 'form-control',
		'placeholder' => 'Email', 
		'required'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('password', 'Contraseña') !!}
	{!! Form::password('password', [
		'class' => 'form-control', 
		'placeholder'=>"**************",
		'autocomplete' => 'new-password',
		'required'
	]) !!}
</div>

<div align="right">
     {!! Form::submit("Crear Nuevo Usuario Medico", ['class' => 'btn btn-success']) !!}
</div>  
 {!! Form::close() !!}

</div>