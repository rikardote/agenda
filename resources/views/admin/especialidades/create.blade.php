@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Agregar nueva Especialidad</div>

                <div class="panel-body">
          		{!! Form::model($especialidades, ['route' => 'especialidades.store', 'method' => 'POST']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">     
                  @include('admin.especialidades.form')

                  {!! link_to('#', $title='Registrar', $attributes = [
                            'id'=>'registro', 'class'=>'btn btn-primary'], $secure = null) !!}
              
                {!! Form::close() !!}
              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection