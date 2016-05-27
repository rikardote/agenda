@extends('layouts.app')

@section('content')
{!! Form::open(['route' => ['users.theme.post'], 'method' => 'POST', 'name' => "myform"]) !!}
<div class="form-group">			
	{!!	Form::select('theme', $themes, null, [
			'id' => 'mySelect',
			'class' => 'form-control',
			'placeholder' => 'Selecciona un tema',
			'required'
		]) !!}
</div>

	
	{!! Form::close() !!}

@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#mySelect').change(function(){
            myform.submit();
        });
    });
</script>
@endsection