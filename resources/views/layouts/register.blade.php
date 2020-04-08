<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-7 h-100 d-flex justify-content-center align-items-center">
                @yield('content')
            </div>
            <div class="col-md-5 d-none d-md-block justify-content-center painel-lateral h-100">
                <div class="vertical-center h-100">
                    <div class="painel-image-container">
                        <img class="painel-lateral-img" src="{{asset('img/justitia.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>