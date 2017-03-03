@extends('control-panel.layouts.app')

@section('page-title')
    Subscriptions
@endsection

@section('page-sub-title')
    List &nbsp; <a href="{!! route('subscriptions.create') !!}" class="btn bg-blue"> <i class="fa fa-plus"></i> Add Subscription</a>
@endsection

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="panel">
                @if(session('global'))
                    <div class="alert alert-{!! session('global')['class'] !!}">
                        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                        {!! session('global')['subscription'] !!}
                    </div>
                @endif

                <div class="panel-body">
                    {!! Form::model($subscription, ['route'=>['subscriptions.update', $subscription->id], 'method'=>'put']) !!}
                    @include('control-panel.subscriptions._partials.form')
                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                        <a href="{!! route('subscriptions.index') !!}" class="btn btn-warning">Cancel</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
