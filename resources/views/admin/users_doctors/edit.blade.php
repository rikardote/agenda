{!! Form::model($user, ['route' => ['registrar_medicos.update', $user->id], 'method' => 'PATCH']) !!}
     {!! Form::open(['route' => 'registrar_medicos.store', 'method' => 'POST']) !!}

	{!! Form::hidden('doctor_id', $user->id) !!}

<div class="form-group">
	{!! Form::label('email', 'Email') !!}
	
	{!! Form::text('email', null, [
		
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
	     {!! Form::submit('Actualizar', ['class' => 'btn btn-success btn-block']) !!}
	</div>  
 {!! Form::close() !!}

