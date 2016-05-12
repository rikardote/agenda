@extends('layouts.app')

@section('title', 'Hoja medica del paciente: '. $paciente->fullname)

@section('content')

	@include('admin.hojas._form')
@endsection
