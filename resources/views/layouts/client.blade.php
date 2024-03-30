<!doctype html>
<html lang="en">
<head>
    <title>@yield('page.title', config("app.name"))</title>
    @include('includes.head')
</head>
<body>
<div class="d-flex flex-column min-vh-100">
    @include('includes.header-client')
    @yield('content')
</div>
</body>
</html>