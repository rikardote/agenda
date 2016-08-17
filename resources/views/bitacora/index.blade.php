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
    <table id="paciente" class="table table-hover" style="visibility: hidden">
      <thead>
        <th>RFC</th>
        <th>Nombre</th>
      </thead>
      <tbody id="paciente-datos">
      </tbody>
    </table>  
     <table id="datos" class="table table-hover" style="visibility: hidden">
        <thead>
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
<script>  
$("#rfc").on('input', function(evt) {
  var input = $(this);
  var start = input[0].selectionStart;
  $(this).val(function (_, val) {
    return val.toUpperCase();
  });
  input[0].selectionStart = input[0].selectionEnd = start;
});
</script>
  <script type="text/javascript">
    $('#search').click(function(){
      var frmrfc = $('#rfc').val();
      var frmtipo = $('#tipo').val();
      var tablaDatos = $("#after_tr");
      var pacienteRfc = $("#paciente-datos");
      var token = $("#token").val();
      var route = "{{ route('bitacora.search') }}";
      var today = new Date().toISOString().slice(0, 10);
      
      var dataString = 'rfc='+frmrfc+'&tipo_id='+frmtipo; 
      
      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        data: dataString,
             success: function(res) {
              document.getElementById("datos").style.visibility="visible";
              document.getElementById("paciente").style.visibility="visible";
              tablaDatos.empty();
              pacienteRfc.empty();
              pacienteRfc.append("<tr><td>"+res[0].paciente.rfc+"/"+res[0].paciente.tipo.code+"</td><td>"+res[0].paciente.nombres+" "+res[0].paciente.apellido_pat+" "+res[0].paciente.apellido_mat+"</td></tr>");  

                $(res).each(function(key, value){
                  tablaDatos.append("<tr><td><a href='http://agenda.slyip.com/citas/"+value.medico.slug+"/"+today+"?date="+value.fecha+"'>"+value.fecha+"</a></td><td>"+value.medico.nombres+" "+value.medico.apellido_pat+" "+value.medico.apellido_mat+"</td><td>"+value.medico.especialidad.name+"</td></tr>");                  
                
              });
             },
             error: function (res) {
              document.getElementById("datos").style.visibility="hidden";
              document.getElementById("paciente").style.visibility="hidden";
              swal({
                title: "Atencion!!... ",   
                text: res.responseText,   
                type: "warning",   
                confirmButtonColor: "#DD6B55",   
                closeOnConfirm: false,
                timer: 3000
               });  
                
             }

          });
    }); 
  </script>
@endsection