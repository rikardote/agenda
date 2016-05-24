<?php use Carbon\Carbon; ?>
@extends('layouts.doctores')

@section('title', 'Hoja medica del paciente: '. $paciente->fullname . ' | '.$anos)

@section('content')
	@include('admin.hojas._form')
@endsection

@section('js')
	
@endsection