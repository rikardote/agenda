@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')
{!! Form::open(array('route' => 'queries.search', 'class'=>'form navbar-form navbar-right searchform')) !!}
    {!! Form::text('search', null,  array('required', 'class'=>'form-control','placeholder'=>'Search for a tutorial...')) !!}
     {!! Form::submit('Search',  array('class'=>'btn btn-default')) !!}
 {!! Form::close() !!}

@endsection