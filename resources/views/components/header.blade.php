<nav style="height: 56px" class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('about') }}">About</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @include('components.headers.links', $links)
    </div>

    @auth
        <a href="{{route('profile')}}">Profile</a>
    @endauth
    @guest
        <a href="{{route('login')}}">Login</a>
        <a href="{{route('signup')}}">Register</a>
    @endguest
</nav>
