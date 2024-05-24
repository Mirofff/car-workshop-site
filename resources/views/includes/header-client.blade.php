<x-header>
    <div class="d-flex w-100 justify-content-between">
        <div class="d-flex container align-items-center">
            <x-nav>
                <a href="/" class="pe-5 text-light text-decoration-none navbar-brand">
                    <img class="d-inline-block align-top" src="{{asset('header-logo.png')}}" height="60" alt="">
                </a>

                <li class="nav-item">
                    <a href="{{route('requests')}}"
                       class="nav-link text-light px-2 text-black {{ Route::is('requests') ? 'active' : '' }}">{{__('Requests')}}</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('vehicles')}}"
                       class="nav-link text-light px-2 text-black {{ Route::is('vehicles') ? 'active' : '' }}">{{__('Vehicles')}}</a>
                </li>
            </x-nav>
        </div>
    </div>
</x-header>
