@extends('layouts.app')

@section('title', 'Reporte Diario de Citas Medicas')

@section('content')
	<div class="col-md-4">
    <div id='datepicker'></div>
  </div>
  <div class="col-md-8">
    
      <div class="panel panel-default">
        
        <div class="panel-body">
        <input type="button" id="toggle" value="Seleccionar Todos" onClick="do_this()" />
         {!! Form::open(['route' => 'reportes.medicos.checkboxes', 'method' => 'POST']) !!} 
            @foreach($medicos as $medico)
               <div class="form-group">
                  {!! Form::checkbox('medicos[]', $medico->id, in_array($medico->id, $checked) ? 'checked="checked"' : '',['id' => 'checkbox']) !!}
                  {!! Form::label('medicos[]', $medico->fullname) !!}
                </div>
              
            @endforeach
          {{ Form::hidden('date', '', ['id' => 'hidden_date']) }}  
          <input type="hidden" name="_token" value={{ csrf_token() }} id="token">
          <input type="button" id="toggle" value="Seleccionar Todos" onClick="do_this()" />
          {!! Form::submit('Obtener Reporte', ['class' => 'btn btn-success btn-block']) !!}
          
          {!! Form::close()!!}
      
       {!! link_to('#', $title='Guardar Configuracion', $attributes= ['id' => 'register', 'class' => 'btn btn-primary btn-block'], $secure=null) !!} 
      </div>
  
  </div>
@endsection
@section('js')
 <script>
    $( "#datepicker" ).datepicker({
      dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        firstDay: 1,
        onSelect: function(dateText, inst) {
          $('#hidden_date').val(dateText);
        }

  });
    
  </script>
  <script>
    $('#register').click(function(){
    var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
    
    var token = $("#token").val();
    var route = "{{ route('reportes.salvar.configuracion') }}";
    
    var dataString = 'checkbox='+myCheckboxes; 
    $.ajax({
      url: route,
      headers: {'X-CSRF-TOKEN': token},
      type: 'POST',
      data: dataString,
           success: function(res) {
            console.log(res);
            toastr.success('Exitosamente', 'Configuracion Guardada!');
           }
      });       
  });
  </script>

  <script>
function do_this(){

        var checkboxes = document.getElementsByName('medicos[]');
        var button = document.getElementById('toggle');

        if(button.value == 'Seleccionar Todos'){
            for (var i in checkboxes){
                checkboxes[i].checked = 'FALSE';
            }
            button.value = 'Quitar Todos'
        }else{
            for (var i in checkboxes){
                checkboxes[i].checked = '';
            }
            button.value = 'Seleccionar Todos';
        }
    }
  </script>
@endsection

