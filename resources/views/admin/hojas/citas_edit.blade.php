@if($cita)
	<strong>Paciente: </strong> 
	<br>
	<br>
	{{ $cita->paciente->nombres }} {{ $cita->paciente->apellido_pat }} {{ $cita->paciente->apellido_mat }} /{{$cita->paciente->tipo->code}}
	<br>
	<br>
	{!!  Form::model($cita,['route' => ['hoja.citas.update', $medico->id, $date, $cita->id], 'method' => 'PATCH']) !!}
		@include('admin.hojas.citas_edit_form')
	 <div align="right">
		{!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
	{!! Form::close() !!}
	</div>

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

