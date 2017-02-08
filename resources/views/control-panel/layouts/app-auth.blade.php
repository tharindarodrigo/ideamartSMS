<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
    {{-- Tell the browser to be responsive to screen width --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- Bootstrap 3.3.6 --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    {{-- Ionicons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    {{-- Theme style --}}
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    {{-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. --}}
    <link rel="stylesheet" href="{{asset('plugins/iCheck/square/blue.css')}}">

    @stack('styles')
    {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
    {{--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]--}}
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    @if($session = Session::get('global'))
        {{--{{dd($session)}}--}}
        <div class="callout callout-{!! $session['type'] !!}">
            <h4>{!! $session['heading'] !!}</h4>

            <p>{!! $session['body'] !!}</p>
        </div>
    @endif

    <div class="register-box-body">
        <p class="login-box-msg">@yield('title')</p>
        @yield('content')
    </div>
</div>
{{-- ./wrapper --}}

{{-- jQuery 2.2.3 --}}
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
{{-- Bootstrap 3.3.6 --}}
<script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
{{-- SlimScroll --}}
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
{{-- FastClick --}}
{{--<script src="{{ asset('plugins/fastclick/fastclick.js')}}"></script>--}}
{{-- AdminLTE App --}}
{{--<script src="{{ asset('dist/js/app.min.js')}}"></script>--}}
{{-- AdminLTE for demo purposes --}}
{{--<script src="{{ asset('dist/js/demo.js')}}"></script>--}}

<script src="{{ asset('plugins/iCheck/icheck.min.js')}}"></script>

@stack('scripts')

</body>
</html>
