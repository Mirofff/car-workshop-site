<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                @auth
                @if ($user->is_admin)
                    <li><a href="{{config('constants.USERS_TABLE_URL')}}" class="nav-link px-2 text-primary">Tables</a></li>
                @endif
                @if ($user->is_operator)
                    <li><a href="{{config('constants.ORDERS_TABLE_URL')}}" class="nav-link px-2 text-primary">Orders</a></li>
                @endif
                @endauth
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..."
                    aria-label="Search">
            </form>

            @auth
                <a href="#" class="justify-content-end px-2 text-white">{{ $user->first_name }}
                    {{ $user->last_name }}</a>

                <div class="dropdown-center">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false"></button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>
            @endauth
            @guest
                <div class="text-end">
                    <a type="button" class="btn btn-outline-light me-2" href="/login">Login</a>
                    <a type="button" class="btn btn-warning" href="/register">Sign-up</a>
                </div>
            @endguest

        </div>
    </div>
</header>
