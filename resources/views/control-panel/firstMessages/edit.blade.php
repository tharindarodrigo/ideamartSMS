@extends('control-panel.layouts.app')

@section('page-title')
    firstMessages
@endsection

@section('page-sub-title')
    List &nbsp; <a href="{!! route('first-messages.create') !!}" class="btn bg-blue"> <i class="fa fa-plus"></i> Add Message</a>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('control-panel/plugins/datepicker/datepicker3.css')}}">
@endpush

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
                    {!! Form::model($firstMessage, ['route'=>['first-messages.update', $firstMessage->id], 'method'=>'put']) !!}
                    @include('control-panel.firstMessages._partials.form')
                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                        <a href="{!! route('first-messages.index') !!}" class="btn btn-warning">Cancel</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')

<script type="text/javascript"
        src="{{asset('control-panel/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script>
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });

</script>

@endpush