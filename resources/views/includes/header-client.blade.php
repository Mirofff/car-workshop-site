<x-header>
    <div class="d-flex w-100 justify-content-between" style="height: 67px; background: rgba(0, 0, 0, 0.8)">
        <div class="d-flex container align-items-center">
            <x-nav>
                <a href="/" class="pe-5 text-light text-decoration-none navbar-brand">
                    <img class="d-inline-block align-top" src="{{asset('header-logo.png')}}" height="60" alt=""
                         style="filter: invert(1)">
                </a>

                <li class="nav-item">
                    <a href="{{route('requests')}}"
                       class="nav-link text-light px-2 {{ Route::is('requests') ? 'active' : '' }}">{{__('Requests')}}</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('vehicles')}}"
                       class="nav-link text-light px-2 {{ Route::is('vehicles') ? 'active' : '' }}">{{__('Vehicles')}}</a>
                </li>
            </x-nav>
        </div>
    </div>
</x-header>