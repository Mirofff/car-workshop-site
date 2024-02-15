<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('about') }}">About</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <x-headers.links :links="$links" />
    </div>

    @auth
        @if(Auth::user()->getRole() != null)
            <a href="{{route('dashboard')}}">{{__('Dashboard')}}</a>
        @endif
        <a href="{{route('profile')}}">Profile</a>
    @endauth
    @guest
        <a href="{{route('signin')}}">{{__('Sign In')}}</a>
        <a href="{{route('signup')}}">{{__('Sign Up')}}>
    @endguest
</nav>
