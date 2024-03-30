<!doctype html>
<html lang="en">
<head>
    <title>@yield('page.title', config("app.name"))</title>
    @include('includes.head')
</head>
<body class="d-flex flex-column min-mh-100">
    @include('includes.header')
    <main class="flex-grow-1 d-flex flex-column fluid-container">
        @yield('content')
    </main>
    @include('includes.footer')
</body>
</html>
