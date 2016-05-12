@extends('layouts.doctores')

@section('title', 'Hoja medica del paciente: '. $paciente->fullname)

@section('content')

	@include('admin.hojas._form')
@endsection

@section('js')
	
@endsection