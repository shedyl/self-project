<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

    <title>Itransition</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
    </ul>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            @if(Auth::check())
                <li class="nav-item mr-auto">
                    <a class="nav-link" href="/profile">My profile</a>
                </li>
                <li class="nav-item mr-auto">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            @else
                <li class="nav-item mr-auto">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <li class="nav-item mr-auto">
                    <a class="nav-link" href="/login">Login</a>
                </li>
            @endif

{{--            @if (Auth::check() && Auth::user()->is_admin)--}}
                <div class="navbar-nav float-md-right">
                    <a class="nav-item nav-link" href="/admin">Admin tools</a>
                </div>
{{--            @endif--}}
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
{{--            @include('admin.components.errors')--}}
{{--            @include('admin.components.flash_alert_info')--}}
        </div>
    </div>
</div>

@yield('content')

<div class="footer-copy">
    <div class="container">АGF
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">&copy; Copyright <a href="/">Itransition, </a> All rights reserved
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ mix('/js/app.js') }}"></script>
@yield('javascript')
</body>

</html>
