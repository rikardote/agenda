@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')
<div class="col-md-4">
    
    <div id="datepicker"></div>
    
</div>
<div align="center">
    <a href="{{ route('citas.nueva_cita', $medico->slug) }}" class="fa fa-pencil fa-2x"></a> <h4> Citas del dia: {{ fecha_dmy($date) }}</h4>
</div>


@if(isset($citas))
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
            <a href="{{ route('admin.citas.edit', [$medico->slug, $cita->id]) }}" ><span class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></span></a>
            <a href="{{ route('admin.citas.destroy', [$medico->slug, $cita->id]) }}" ><span class="fa fa-trash fa-2x" aria-hidden="true"></span></a>
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
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        firstDay: 1,
        beforeShowDay: highlightDays,
        onSelect: function () {
            var Path = window.location.pathname;
            window.open(Path + '?date=' + this.value, '_self',false);
        }
  });

  </script

@endsection