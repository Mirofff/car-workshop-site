<!doctype html>
<html lang="en">
<head>
    <title>@yield('page.title', config("app.name"))</title>
    @include('includes.head')
</head>
<body>
<div class="container-fluid">
    <div class="row">
        @yield('content')
    </div>
</div>
</body>
@include('includes.js')
</html>
