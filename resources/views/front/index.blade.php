@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Agenda de {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    @include('front.partial._form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
