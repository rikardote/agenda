@extends('layouts.app')

@section('title', 'Bitacora / Buscar citas')

@section('content')
  <div  class="container">
   {!! Form::open(['route' => ['bitacora.search'], 'method' => 'post']) !!}
     <div class="form-group">
        <div class="col-md-4">
          <input  maxlength="10" id="rfc" type="text" class="form-control" name="rfc" placeholder="Buscar paciente por RFC / 10 digitos" required>
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
             {{ Form::submit('Buscar', array('class' => 'btn btn-success')) }}
        </div>
    {!!Form::close()!!}
    
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
/*
    $('#search').click(function(){
      var frmrfc = $('#rfc').val();
      var frmtipo = $('#tipo').val();
      var tablaDatos = $("#after_tr");
      var pacienteRfc = $("#paciente-datos");
      var token = $("#token").val();
      var route = "{{ route('bitacora.search') }}";
      var today = new Date().toISOString().slice(0, 10);
      //var link = "http://agenda.slyip.com/citas/";
      var link = "{{route('citas.index')}}/";
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
              console.log(res);

               //$(res).each(function(key, value){
               
              //});
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
    */
  </script>
@endsection