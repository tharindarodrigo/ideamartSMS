@extends('control-panel.layouts.app')

@section('page-title')
    Messages
@endsection

@section('page-sub-title')
    List &nbsp; <a href="{!! route('messages.create') !!}" class="btn bg-blue"> <i class="fa fa-plus"></i> Add Message</a>
@endsection

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="panel">
                @if(session('global'))
                    <div class="alert alert-{!! session('global')['class'] !!}">
                        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                        {!! session('global')['message'] !!}
                    </div>
                @endif

                <div class="panel-body">
                    {!! Form::open(['route'=>['messages.store']]) !!}
                    @include('control-panel.messages._partials.form')
                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection