@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')
<div class="col-md-4">
    
    <div id="datepicker" id="depart"></div>

    
    
</div>


@if(isset($citas))
<div align="center">
  @if($citas->count() < 10)
        <a href="{{ route('citas.nueva_cita', [$medico->slug , $date]) }}" class="fa fa-pencil fa-2x"></a> <h3> Hay <span class="badge">{{ $citas->count() }}</span> Citas del dia: {{ fecha_dmy($date) }}</h3>
  @else
  <h3> Hay <span class="badge">{{ $citas->count() }}</span> Citas del dia: {{ fecha_dmy($date) }}</h3>
  <br>
    <b><span class="blink">No se pueden programar mas Citas para esta fecha.</span></b>
  @endif
</div>
<div class="col-md-8">
 <table class="table table-striped">
    <thead>
        <th>Folio</th>
        
        <th>Paciente</th>
        <th>Horario</th>

        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($citas as $cita)
        <tr>
         <td>{{ $cita->id }}</td>
         
 		 <td>{{ $cita->paciente->apellido_pat }} {{ $cita->paciente->apellido_mat }} {{ $cita->paciente->nombres }}</td>
 		 <td>{{ $cita->horario }}</td>
        
         
         <td>
            <a href="{{ route('admin.citas.edit', [$medico->slug, $date, $cita->id]) }}" ><span class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></span></a>
            <a href="{{ route('admin.citas.destroy', [$medico->slug, $date, $cita->id]) }}" onclick="return confirm('Seguro desea eliminarlo?')"><span class="fa fa-trash fa-2x" aria-hidden="true"></span></a>
         </td>
        </tr>
    @endforeach
    </tbody>
   @else
   No hay citas asignadas
   @endif
   
</table>

</div>

@endsection

@section('js')
 <script>
  $.datepicker.setDefaults($.datepicker.regional['es-MX']);
    $( "#datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        firstDay: 1,
        defaultDate: '{{ $date }}',

        onSelect: function () {
            var Path = window.location.pathname;
            window.open(Path + '?date=' + this.value, '_self',false);
        }
  });
    
  </script>

@endsection