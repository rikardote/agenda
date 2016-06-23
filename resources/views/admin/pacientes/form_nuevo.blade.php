{!! Form::open(['route' => ['admin.pacientes.store', $slug, $date], 'method' => 'POST']) !!}
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('rfc', 'RFC') !!}
			
			{!! Form::text('rfc', strtoupper($rfc), [
				
				'class' => 'form-control',
				'placeholder' => 'Ingresar RFC', 
				'required'
			]) !!}

			{!! Form::label('tipo', 'Tipo') !!}
			{!! Form::select('tipo_id', $tipos, null, [
				'class' => 'form-control',
				'placeholder' => 'Selecciona un tipo', 
				'required'
			]) !!}
				{!! Form::label('gender', 'Sexo') !!}
			{!!	Form::select('gender', array('F' => 'FEMENINO', 'M' => 'MASCULINO'), null, [
				'class' => 'form-control',
				'placeholder' => 'Selecciona el genero', 
				'required'
			]) !!}

			{!! Form::label('nombres', 'Nombres') !!}
			
			{!! Form::text('nombres', null, [
				
				'class' => 'form-control',
				'placeholder' => 'Nombres', 
				'required'
			]) !!}

			{!! Form::label('apellido_pat', 'Apellido Paterno') !!}
			
			{!! Form::text('apellido_pat', null, [
				
				'class' => 'form-control',
				'placeholder' => 'Apellido Paterno', 
				'required'
			]) !!}

			{!! Form::label('apellido_mat', 'Apellido Materno') !!}
			
			{!! Form::text('apellido_mat', null, [
				
				'class' => 'form-control',
				'placeholder' => 'Apellido Materno', 
				'required'
			]) !!}
		</div>	
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('foraneo_id', 'Ubicacion') !!}
			{!!	Form::select('foraneo_id', array('1' => 'Mexicali', '2' => 'Ensenada', '3' => 'Tijuana', '4' => 'San Luis R.C', '5' => 'Tecate'), 1, [
				'class' => 'form-control',
				'placeholder' => 'Selecciona ubicación', 
				'required'
			]) !!}
			{!! Form::label('phone', 'Telefono Movil') !!}
			
			{!! Form::text('phone', null, [
				
				'class' => 'form-control',
				'placeholder' => 'Telefono Movil', 
				
			]) !!}
			{!! Form::label('phone_casa', 'Telefono Fijo') !!}
			
			{!! Form::text('phone_casa', null, [
				
				'class' => 'form-control',
				'placeholder' => 'Telefono Fijo', 
				
			]) !!}
			{!! Form::label('address', 'Direccion') !!}
			
			{!! Form::text('address', null, [
				
				'class' => 'form-control',
				'placeholder' => 'Direccion', 
				
			]) !!}
			{!! Form::label('colonia_id', 'Colonia') !!}
			
			{!! Form::text('colonia_id', null, [
				'id' => 'autocomplete',
				'class' => 'form-control',
				'placeholder' => 'Colonia', 
				
			]) !!}


			{!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}
			<br>
			{!! Form::text('fecha_nacimiento',null, [
				'class' => 'form-control',
				
				'id' => 'dob',
				'style' => 'width: 10em;'
			]) !!}

			</div>	

		</div>	
		
</div>
<div align="right">
				{!! Form::submit('Agregar', ['class' => 'btn btn-success']) !!}

			</div>	
			{!!Form::close()!!}	

<script>
		$('#dob').datetextentry();
	</script>
	<script>
        $(document).ready(function () {
            $('input:text').bind({
            });
            $("#autocomplete").autocomplete({
                minLength:3,
                source: '/getColonias'
            });
        });
    </script>