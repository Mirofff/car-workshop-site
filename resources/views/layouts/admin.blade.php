<!doctype html>
<html lang="en">
<head>
    <title>@yield('page.title', config("app.name"))</title>
    @include('includes.head')
    @include('includes.js')
</head>
<body>
<div class="d-flex flex-column min-vh-100">
    @include('includes.header-admin')
    <main class="flex-grow-1 d-flex flex-column fluid-container">
        @yield('content')
    </main>
</div>
</body>
</html>