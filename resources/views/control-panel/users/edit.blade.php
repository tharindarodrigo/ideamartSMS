@extends('control-panel.layouts.app')

@section('content')

    <div class="panel">
        <div class="panel-body">

            {!! Form::model($user) !!}
            @include('control-panel.users._partials.form')
            <button class="btn btn-flat btn-primary">Submit</button>
            {!! Form::close() !!}


        </div>
    </div>

@endsection