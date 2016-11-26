<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Roulette - @yield('title')</title>
    <!-- CSS   ?-->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/jquery-ui-1.11.4/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/chat.css')}}">
    <!-- fonts awesome ?-->
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">

    <!-- JS   ?-->
    <script src="{{asset('assets/jquery/jquery-1.12.3.min.js')}}"></script>
    <script src="{{asset('assets/jquery-ui-1.11.4/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/socket.io/socket.io.js')}}"></script>
    <script src="{{asset('assets/carhartl-jquery-cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>


</head>
<body>

@section('sidebar')
@show
@include('partials.nav-bar2')
<div class="pad"></div>
<div class="container-fluid right-padding-no">
    <div class="row">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-lg-9 col-md-9">
                @yield('content')
        </div>
        @include('partials.sidebar-chat')
    </div>
</div>
{{--<script src="{{asset('assets/socket.io/socket.io.js')}}"></script>--}}
<script src="{{asset('assets/js/socets.js')}}"></script>
<script src="{{asset('assets/js/chat.js')}}"></script>
</body>
</html>