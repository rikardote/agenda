<div class="form-group">
  {!! Form::label('fecha', 'Fecha') !!}
  {!! Form::text('fecha', null, [
    'class' => 'form-control',
    'placeholder' => 'Fecha Inicial', 
    'required',
    'id' => 'datepicker_inicial'
  ]) !!}

	{!! Form::label('description', 'Descripcion') !!}
	{!! Form::text('description', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Descripcion', 
		'required'
	]) !!}
</div>

<script type="text/javascript">
  $(function() {
    $( "#datepicker_inicial" ).datepicker();
  });
  </script>
<script>
$.datepicker.setDefaults($.datepicker.regional['es-MX']);
$('#datepicker_inicial').datepicker({
    dateFormat: 'dd/mm/yy',
    changeMonth: true,
    changeYear: true,
    firstDay: 1,
 });
</script>