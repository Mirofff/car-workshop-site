<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('bootstrap/css/bootstrap-grid.min.css') }}" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('bootstrap/css/bootstrap-reboot.min.css') }}" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('bootstrap/css/bootstrap-utilities.min.css') }}" rel="stylesheet" crossorigin="anonymous">

    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    <title>{{ Route::currentRouteName() }}</title>

    <style>
        .carousel { height: calc(100vh - 56px);}
        .carousel-inner,.carousel-item { height: 100%;}
        .carousel-item { background-color: #000;}
        .carousel-item img { height: 100%; object-fit: cover; object-position: center;}
    </style>
</head>

