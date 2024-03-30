<x-head/>
<body class="d-flex flex-column overflow-hidden min-vh-100 vh-100">
<x-header/>
<main role="main" class="flex-grow-1 overflow-auto">
    {{$slot}}
</main>

{{--<x-footer/>--}}
</body>