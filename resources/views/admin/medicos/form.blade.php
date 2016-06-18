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
	{!! Form::label('cedula', 'Cedula Profesional') !!}
	
	{!! Form::text('cedula', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Cedula Profesional', 
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
	{!! Form::label('d_consulta', 'Dias de consulta') !!}
	<div class="col-xl-12">
	{!! Form::select('d_consulta[]', $diasConsulta, isset($diasconsulta_select) ? $diasconsulta_select:null, [
		'class' => 'form-control select-tipo', 
		'multiple', 
		'required'
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
<script>
	$('.select-tipo').chosen({
		placeholder_text_multiple: 'Seleccione dias de consulta'
		
	});
		
</script>