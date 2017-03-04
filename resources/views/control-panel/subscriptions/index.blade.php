@extends('control-panel.layouts.app')

@section('page-title')
    Subscriptions Summary
@endsection

@section('page-sub-title')

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
                    @include('control-panel.subscriptions._partials.list')
                </div>
            </div>
        </div>
    </div>

@endsection
