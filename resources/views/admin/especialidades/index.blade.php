@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Especialidades</div>

                <div class="panel-body">
          		{!! link_to_route('especialidades.create', 'Nueva Especialidad', [], ['class' => 'btn btn-info'])  !!}
                <br>
                Listado de todas las especialidades AQui
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
