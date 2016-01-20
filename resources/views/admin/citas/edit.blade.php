@if($cita)
	<strong>Paciente: </strong> 
	<br>
	<br>
	{{ $cita->paciente->nombres }} {{ $cita->paciente->apellido_pat }} {{ $cita->paciente->apellido_mat }}
	<br>
	<br>
	{!!  Form::model($cita, ['route' => ['admin.citas.update', $medico->slug, $date, $cita->id], 'method' => 'PATCH']) !!}
		@include('admin.citas.edit_form')
		{!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
	{!! Form::close() !!}

@endif

<script type="text/javascript">
  $(function() {
    $( "#fecha_inicial" ).datepicker();
  });
 </script>
 <script>
$.datepicker.setDefaults($.datepicker.regional['es-MX']);
$('#fecha_inicial').datepicker({
    dateFormat: 'dd-mm-yy',
    changeMonth: true,
    changeYear: true,
    firstDay: 1,
    onClose: function () {
        $('#datepicker_final').val(this.value);
    }
});

