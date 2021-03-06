
	{!! Form::hidden('paciente_id', $paciente->id) !!}
	{!! Form::hidden('medico_id', $medico->id) !!}
	{!! Form::hidden('cita_id', $cita_id) !!}
	<div class="row">
		<div class="col-md-4">
			
			<div class="form-group">
				
				{!! Form::checkbox('laboratorio') !!}
				{!! Form::label('laboratorio', 'Laboratorio') !!}
			</div>
			<div class="form-group">
				
				{!! Form::checkbox('rayosx') !!}
				{!! Form::label('rayosx', 'Rayos X') !!}
			</div>
			<div class="form-group">
				
				{!! Form::checkbox('interconsulta') !!}
				{!! Form::label('interconsulta', 'Interconsulta') !!}
			</div>
			<div class="form-group">
				
				{!! Form::checkbox('pase_otra_unidad') !!}
				{!! Form::label('pase_otra_unidad', 'Pase a otra unidad') !!}
			</div>
			<div class="form-group">
			{!! Form::checkbox('primera_vez') !!}
			{!! Form::label('primera_vez', 'Primera Vez') !!}
		</div>
		<div class="form-group">	
			{!! Form::checkbox('subsecuente') !!}
			{!! Form::label('subsecuente', 'Subsecuente') !!}
		</div>
		</div>
	<div class="col-md-4">
		
		<div class="form-group">
			{!! Form::checkbox('reprogramada') !!}
			{!! Form::label('reprogramada', 'Reprogramada') !!}
		</div>
		<div class="form-group">
			{!! Form::checkbox('suspendida') !!}
			{!! Form::label('suspendida', 'Suspendida') !!}
		</div>
		<div class="form-group">
			{!! Form::checkbox('diferida') !!}
			{!! Form::label('diferida', 'Diferida') !!}
		</div>
		<div class="form-group">
			{!! Form::checkbox('num_otorgados') !!}
			{!! Form::label('num_otorgados', 'Num Otorgados') !!}
		</div>
		<div class="form-group">
				{!! Form::label('edad', 'Edad') !!}
				{!! Form::text('age', null, [
					'class' => 'form-control',
					'placeholder' => 'Edad',
				
				]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('codigo_cie_id', 'Codigo CIE-10') !!}

			@if(isset($cie))
				
				{!! Form::text('codigo_cie_id', $cie->code, [
					'class' => 'form-control',
					'placeholder' => 'Diagnostico - CIE 10',
					'id' => 'auto' 
				]) !!}
			
			@else
				
					{!! Form::text('codigo_cie_id', null, [
						'class' => 'form-control',
						'placeholder' => 'Diagnostico - CIE 10',
						'id' => 'auto' 
					]) !!}
				
		
			@endif
		</div>

	</div>
	<div class="col-md-4">
		
		<div class="form-group">
			{!! Form::label('num_licencia_medica', 'Numero de Licencia Medica') !!}
				
			{!! Form::text('num_licencia_medica', null, [
				'id' => 'tags', 
				'class' => 'form-control',
				'placeholder' => 'Numero de Licencia', 
			]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('num_de_dias', 'Dias de incapacidad') !!}
			{!! Form::number('num_de_dias', null, [
				'class' => 'form-control',
				'placeholder' => 'Total Dias de Incapacidad', 
			]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('num_medicamentos', 'Total Medicamentos Recetados') !!}
			{!! Form::number('num_medicamentos', null, [
				'class' => 'form-control',
				'placeholder' => 'Numero de medicamentos',

			]) !!}
		</div>
		
	</div>
</div>


