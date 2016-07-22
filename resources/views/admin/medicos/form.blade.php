<div class="row">
<div class="col-md-6">
	<div class="form-group">
		{!! Form::label('num_empleado', 'Num Empleado') !!}
		
		{!! Form::text('num_empleado', null, [
			
			'class' => 'form-control',
			'placeholder' => 'Numero de empleado', 
			'required'
		]) !!}
	</div>
	<div class="form-group">
		{!! Form::label('nombres', 'Nombres') !!}
		
		{!! Form::text('nombres', null, [
			
			'class' => 'form-control',
			'placeholder' => 'Nombres', 
			'required'
		]) !!}
	</div>
	<div class="form-group">
		{!! Form::label('apellido_pat', 'Apellido Paterno') !!}
		
		{!! Form::text('apellido_pat', null, [
			
			'class' => 'form-control',
			'placeholder' => 'Apellido Paterno', 
			'required'
		]) !!}
	</div>
	<div class="form-group">
		{!! Form::label('apellido_mat', 'Apellido Materno') !!}
		
		{!! Form::text('apellido_mat', null, [
			
			'class' => 'form-control',
			'placeholder' => 'Apellido Materno', 
			'required'
		]) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('especialidad_id', 'Especialidad') !!}
		{!! Form::select('especialidad_id', $especialidades, null, [
			'class' => 'form-control', 
			'placeholder' => 'Selecciona una especialidad', 
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
</div>
<div class="col-md-6">
	
	<div class="form-group">
		{!! Form::label('d_consulta', 'Dias de consulta') !!}
		<div class="col-xl-12">
		{!! Form::select('d_consulta[]', $diasConsulta, isset($diasconsulta_select) ? $diasconsulta_select:null, [
			'class' => 'form-control select-tipo', 
			'multiple', 
			
		]) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('d_especial_consulta', 'Dia ESPECIAL de consulta') !!}
		<div class="col-xl-12">
		{!! Form::select('d_especial_consulta[]', $diasConsulta, isset($diaconsulta_select) ? $diaconsulta_select:null, [
			'class' => 'form-control select-tipo2', 
			'multiple'
		]) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('horario_id', 'Horario') !!}
		{!! Form::select('horario_id', $horarios, null, [
			'class' => 'form-control',
			'placeholder' => 'Selecciona un horario', 
			'required'
		]) !!}
	</div>
	<div class="form-group">
		{!! Form::label('tuno', 'Turno') !!}
		{!! Form::select('turno', array('1' => 'MATUTINO', '2' => 'VESPERTINO'), null,[
			'class' => 'form-control',
			'placeholder' => 'Selecciona el turno...', 
			'required'
		]) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('comentarios', 'Comentario') !!}
		
		{!! Form::textarea('comentarios', null, [
			
			'class' => 'form-control',
			'placeholder' => 'Inserta un comentario', 
		]) !!}
	</div>
</div>
</div>
<script>
	$('.select-tipo').chosen({
		placeholder_text_multiple: 'Seleccione dias de consulta'
		
	});
	$('.select-tipo2').chosen({
		placeholder_text_multiple: 'Seleccione Dia Especial de Consulta'
		
	});
		
</script>