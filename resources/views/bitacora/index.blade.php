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

 
@endsection