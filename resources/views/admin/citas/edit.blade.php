@if($cita)
	<strong>Paciente: </strong> 
	<br>
	<br>
	{{ $cita->paciente->nombres }} {{ $cita->paciente->apellido_pat }} {{ $cita->paciente->apellido_mat }} /{{$cita->paciente->tipo->code}}
	<br>
	<br>
	{!!  Form::model($cita, ['route' => ['admin.citas.update', $medico->slug, $date, $cita->id], 'method' => 'PATCH']) !!}
		@include('admin.citas.edit_form')
	 <div align="right">
		{!! Form::submit('Actualizar', ['class' => 'btn btn-success btn-block']) !!}
	{!! Form::close() !!}
	</div>

@endif

<script type="text/javascript">
$.datepicker.setDefaults($.datepicker.regional['es-MX']);

  var dates = <?php echo json_encode($todas_citas); ?>;
    $( "#fecha_inicial" ).datepicker({
      dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        firstDay: 1,
        defaultDate: '{{ $date }}',

        beforeShowDay : function(date){
          var y = date.getFullYear().toString(); // get full year
          var m = (date.getMonth() + 1).toString(); // get month.
          var d = date.getDate().toString(); // get Day
          if(m.length == 1){ m = '0' + m; } // append zero(0) if single digit
          if(d.length == 1){ d = '0' + d; } // append zero(0) if single digit
          var currDate = y+'-'+m+'-'+d;
          if(dates.indexOf(currDate) >= 0){
            return [true, "ui-highlight"];  
          }else{
            return [true];
          }         
        }

       
  });
    $('#timepicker').timepicker({ 
        'step': <?php echo $minutes; ?>,
        'minTime': '<?php echo $entrada; ?>',
          'maxTime': '<?php echo $salida; ?>',
          'timeFormat': 'H:i',
          'disableTextInput': true,
          'disableTimeRanges': 
          [
           <?php echo $intervaloPrimeravez; ?>,
            <?php echo $horas; ?>
          ]
            
    });

 </script>