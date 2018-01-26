@extends('layouts.app')

@section('title', 'Bitacora / Pacientes')

@section('content')
<div  class="container">
   {!! Form::open(['route' => ['bitacora.search'], 'method' => 'post']) !!}
     <div class="form-group">
        <div class="col-md-4">
          <input  maxlength="10" id="rfc" type="text" class="form-control" name="rfc" placeholder="Buscar paciente por RFC / 10 digitos" required>
        </div>
     </div>
       
        <div class="col-md-4">
             {{ Form::submit('Buscar', array('class' => 'btn btn-success')) }}
        </div>
    {!!Form::close()!!}
    
<br><br><br><br>
	@if($pacientes->count() >= 1)
		Se encontraron {{$pacientes->count()}} pacientes
		<br>
		@foreach($pacientes as $paciente)
			 {{--*/ $citas = getCitasPorPaciente($paciente->id) /*--}}

		 	<a type="button" data-toggle="collapse" data-target="#{{$paciente->slug}}">
		 		<li class="no-bullet">

		 			<label class="alert alert-info">{{ $paciente->nombres }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }} -- {{ $paciente->rfc }}/{{ $paciente->tipo->code }}
		 			</label>
		 		</li>
		 	</a>
		   <div id="{{$paciente->slug}}" class="collapse">
				<div class="col-md-10">
				    <table class="table" >
				        <thead>
				           <th>Fecha</th>
				           <th>Medico</th>
				           <th>Especialidad</th>
				        </thead> 
				       <tbody>
					       	@foreach($citas as $cita)
					       		<tr>
						       		<td>{{$cita->fecha}}</td>
						       		<td>{{$cita->medico->nombres }} {{ $cita->medico->apellido_pat }} {{ $cita->medico->apellido_mat }} </td>
						       		<td>{{$cita->medico->especialidad->name}}</td>
					       		</tr>
					       	@endforeach
				       </tbody>
				     </table>
				   </div>
		 </div>

		  <br>
		@endforeach
	@else
		<label class="alert alert-warning"> No hay Datos Registrados Para Ese RFC </label>
	@endif
</div>   
@endsection