@extends('layouts.app')

@section('title', 'Bitacora / Buscar citas')

@section('content')
  <div  class="container">
   
    
    <form action="#" method="POST", name="formulario">
      <input type="hidden" name="_token" value={{ csrf_token() }} id="token">
      <div class="form-group">
        <div class="col-md-4">
          <input  maxlength="10" id="rfc" type="text" class="form-control" name="rfc" placeholder="Buscar paciente por RFC / 10 digitos">
        </div>
       </div>
        <div class="form-group">
          <div class="col-md-4">
          
          {!! Form::select('tipo_id', $tipos, null, [
            'class' => 'form-control',
            'name' => 'tipo_id',
            'id' => 'tipo',
            'placeholder' => 'Selecciona un tipo', 
            'required'
          ]) !!}
        </div>
        </div>
        <div class="col-md-4">
            {!! link_to('#', $title='Buscar', $attributes= ['id' => 'search', 'class' => 'btn btn-success'], $secure=null) !!} 
        </div>
     
    </form>
  <div class="col-md-8">
     <table id="datos" class="table table-hover" style="visibility: hidden">
       
        <thead>
           <th>RFC</th>
           <th>Nombre</th>
           <th>Datos de Cita</th>
           <th>Medico</th>
           <th>Especialidad</th>
        </thead> 
       <tbody id="after_tr">
       </tbody>
     </table>
   </div>
 </div>
@endsection

@section('js')
  <script type="text/javascript">
    $('#search').click(function(){
      var frmrfc = $('#rfc').val();
      var frmtipo = $('#tipo').val();
      var tablaDatos = $("#after_tr");
      var token = $("#token").val();
      var route = "{{ route('bitacora.search') }}";
      //alert(frmrfc);
      var dataString = 'rfc='+frmrfc+'&tipo_id='+frmtipo; 
      
      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        data: dataString,
             success: function(res) {
              document.getElementById("datos").style.visibility="visible";
              $("#after_tr").empty();
                $(res).each(function(key, value){
                  tablaDatos.append("<tr><td>"+value.paciente.rfc+"</td><td>"+value.paciente.nombres+" "+value.paciente.apellido_pat+" "+value.paciente.apellido_mat+"</td><td>"+value.fecha+"</td><td>"+value.medico.nombres+" "+value.medico.apellido_pat+" "+value.medico.apellido_mat+"</td><td>"+value.medico.especialidad.name+"</td></tr>");                  
                
              });
             },
             error: function (res) {
                
                
             }

          });
    }); 
  </script>
@endsection