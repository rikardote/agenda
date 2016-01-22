
{!! Form::model($user, ['route' => ['registrar.update', $user->id], 'method' => 'PATCH']) !!}
     {!! Form::open(['route' => 'registrar.store', 'method' => 'POST']) !!}
<div class="form-group">
	{!! Form::label('name', 'Nombre') !!}
	
	{!! Form::text('name', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Nombre del usuario', 
		'required'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('email', 'Email') !!}
	
	{!! Form::text('email', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Email', 
		'required'
	]) !!}
</div>

<div class="form-group">
		{!! Form::label('especialidades', 'Especialidades') !!}
		{!! Form::select('especialidades[]', $especialidades, $especialidades_select,['class' => 'form-control select-tipo', 'multiple', 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('type', 'Tipo') !!}
	{!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion...']) !!}
</div>
	<div align="right">
	     {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
	</div>  
 {!! Form::close() !!}
	


	

<script>
		$('.select-tipo').chosen({
			placeholder_text_multiple: 'Seleccione las Especialidades'
		});
		
</script>