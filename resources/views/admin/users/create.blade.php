<div class="form-group">
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
	{!! Form::label('password', 'Contraseña') !!}
	{!! Form::password('password', [
		'class' => 'form-control', 
		'placeholder'=>"**************",
		'required'
	]) !!}
</div>
<div class="form-group">
		{!! Form::label('especialidades', 'Especialidades') !!}
		<div class="col-xl-12">
			{!! Form::select('especialidades[]', $especialidades, null,['class' => 'form-control select-tipo chosen-choices', 'multiple', 'required']) !!}
		</div>		
</div>
<div class="form-group">
	{!! Form::label('type', 'Tipo') !!}
	{!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion...']) !!}
</div>
	<div align="right">
	     {!! Form::submit("Crear Nuevo Usuario", ['class' => 'btn btn-success btn-block']) !!}
	</div>  
 {!! Form::close() !!}


<script>
		$('.select-tipo').chosen({
			placeholder_text_multiple: 'Seleccione las Especialidades',
			width: "inherit"
		});
		
</script>