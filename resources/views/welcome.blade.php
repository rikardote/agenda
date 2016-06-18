<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
<style>
table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
	text-align: center;
	}

</style>

 <img src="http://fotos.app/fotos/issste_logo.jpg"></img>
 <br>
 Citas del {{fecha_dmy($date)}}:
 <br>
 Dr. {{$medico->nombres}} {{$medico->apellido_pat}} {{$medico->apellido_mat}}
 <br>
 <table style="width:100%">
      <tr>
        <th>Folio</th>
        <th>RFC</th>
        <th>Paciente</th>
        <th>Horario</th>
      </tr> 
     
        @foreach($citas as $cita)
          <tr>
            <td>{{ $cita->id }}</td>
            <td>{{ $cita->paciente->rfc }} /{{ $cita->paciente->tipo->tipo }}</td>
          	<td style="text-align:left">{{ $cita->paciente->apellido_pat }} {{ $cita->paciente->apellido_mat }} {{ $cita->paciente->nombres }}</td>
     		<td>{{ $cita->horario }}</td>
          </tr>
        @endforeach
</table>
 </body>
 </html> 


 