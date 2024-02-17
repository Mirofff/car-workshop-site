<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('about') }}">About</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <x-headers.links :links="$links" />
    </div>

    @auth
        @if(Auth::user()->getRole() != null)
            <a href="{{route('dashboard')}}" class="m-2">{{__('Dashboard')}}</a>
        @endif
        <a href="{{route('profile')}}" class="m-2">Profile</a>
    @endauth
    @guest
        <a href="{{route('signin')}}" class="m-2">{{__('Sign In')}}</a>
        <a href="{{route('signup')}}" class="m-2">{{__('Sign Up')}}>
    @endguest
</nav>
