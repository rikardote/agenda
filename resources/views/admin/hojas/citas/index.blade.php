@extends('layouts.doctores')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')
<div class="col-md-4">
    <div id="datepicker" id="depart"></div>
</div>

@if($citas)
  <div class="col-md-8">
    <div class="panel-group">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div align="center">
            

          <?php 
            $permiso_act = 0;
              if (isset($permiso->fecha_inicio) && isset($permiso->fecha_final)) {
                $date2 = strtotime($date);
                $f_inicio = strtotime($permiso->fecha_inicio); 
                $f_final = strtotime($permiso->fecha_final); 
              
                if($date2 >= $f_inicio && $date2 <= $f_final) {
                  $permiso_act = 1;
                   echo "<b><span style='color: red'>El medico esta de Permiso hasta el ".fecha_dmy($permiso->fecha_final)."</span></b>";
                }
              }
          ?>
            @if($citas->count() < 10 && $permiso_act != 1)
              <a data-url="{{ route('medico.nueva_cita', [$medico->slug , $date]) }}" class="load-form-modal fa fa-pencil fa-2x panelColor" data-toggle ="modal" data-target='#form-modal'></a> 
              <h3> Hay <span class="badge">{{ $citas->count() }}</span> Citas del dia: {{ fecha_dmy($date) }}</h3>
            @else
              <h3> Hay <span class="badge">{{ $citas->count() }}</span> Citas del dia: {{ fecha_dmy($date) }}</h3>
              <br>
              @if($citas->count() >= 10)
              <b><span class="blink">No se pueden programar mas Citas para esta fecha.</span></b>
              @endif
            @endif

          </div>
        </div>

     <table class="table table-hover table-condensed">
      <thead>
        <th>Folio</th>
        <th>Paciente</th>
        <th>Horario</th>
        <th>Accion</th>
      </thead>
      <tbody>
        @foreach($citas as $cita)
        {{--*/ $tachado = ($cita->concretada == 1) ? "tachado" : "" /*--}}
          <tr class='{{$tachado}}'>
            <td>{{ $cita->id }}</td>
          
            <td>{{ $cita->paciente->apellido_pat }} {{ $cita->paciente->apellido_mat }} {{ $cita->paciente->nombres }} <br> <strong><small>{{$cita->paciente->rfc}} /{{$cita->paciente->tipo->code}}</small></strong></td>
     		<td>{{ $cita->horario }}</td>
            <td>

            <a class="panelColorGreen" href="{{ route('admin.citas.concretada', [$medico->slug , $date, $cita->id]) }}">
                <span class="fa fa-check-square-o fa-2x"></span>
              </a>
              <a class="load-form-modal panelColorGreen"
                data-url="{{ route('admin.citas.edit', [$medico->slug , $date, $cita->id]) }}" 
                data-toggle ="modal" data-target='#form-modal'><span class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></span>
              </a> 

              <a href="{{ route('admin.citas.destroy', [$medico->slug, $date, $cita->id]) }}" onclick="return confirm('Seguro desea eliminarlo?')"><span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span>
              </a>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
@else
  No hay citas asignadas
@endif
 
        @include('admin.partials.form-modal', ['title'=>'Cita para el dia: '.fecha_dmy($date)])
        @include('admin.partials.confirmation_modal', ['title'=>'Confirmation Modal'])

    </div>
  </div>
</div>


@endsection

@section('js')
 <script>
  $.datepicker.setDefaults($.datepicker.regional['es-MX']);
  var dates = <?php echo json_encode($todas_citas); ?>;
    $( "#datepicker" ).datepicker({
      dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        firstDay: 1,
        defaultDate: '{{ $date }}',
        onSelect: function () {
            var Path = window.location.pathname;
            window.open(Path + '?date=' + this.value, '_self',false);
        },

        beforeShowDay: function(date){
            var permiso = <?=$permiso_act?>;
            var y = date.getFullYear().toString(); // get full year
            var m = (date.getMonth() + 1).toString(); // get month.
            var d = date.getDate().toString(); // get Day
            if(m.length == 1){ m = '0' + m; } // append zero(0) if single digit
            if(d.length == 1){ d = '0' + d; } // append zero(0) if single digit
            var currDate = y+'-'+m+'-'+d;
            if(dates.indexOf(currDate) >= 0){
              return [true, "ui-highlight"];  
            }
            else{
              return [true];
            }

         }
       
  });
    
  </script>