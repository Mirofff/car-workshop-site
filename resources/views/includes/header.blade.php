<x-header>
    {{--    --}}
    {{--    <section class="d-flex flex-column text-center w-100"--}}
    {{--             style="background-image: linear-gradient( rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4) ),  url('{{asset('img/slider/second.png')}}'); background-repeat: no-repeat; background-size: cover; height: 370px">--}}
    {{--        <div class="d-flex w-100 justify-content-between" style="height: 67px; background: rgba(0, 0, 0, .65)">--}}
    {{--            <div class="d-flex container align-items-center">--}}
    {{--                <a href="/" class="pe-5 text-light text-decoration-none navbar-brand">--}}
    {{--                    <img class="d-inline-block align-top" src="{{asset('header-logo.png')}}" height="60" alt=""--}}
    {{--                         style="filter: invert(1)">--}}
    {{--                </a>--}}

    {{--                <x-nav>--}}
    {{--                    --}}{{--            <a class="navbar-brand" href="#">{{ __("Car Workshop") }}</a>--}}
    {{--                    --}}{{--            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"--}}
    {{--                    --}}{{--                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">--}}
    {{--                    --}}{{--                <span class="navbar-toggler-icon"></span>--}}
    {{--                    --}}{{--            </button>--}}
    {{--                    <li class="nav-item">--}}
    {{--                        <a class="nav-link text-light active" aria-current="page" href="#">{{__("Home")}}</a>--}}
    {{--                    </li>--}}
    {{--                    <li class="nav-item">--}}
    {{--                        <a class="nav-link text-light" href="#">{{__('Specialists')}}</a>--}}
    {{--                    </li>--}}
    {{--                    <li class="nav-item">--}}
    {{--                        <a class="nav-link text-light" aria-disabled="true">{{__("Workshops Info")}}</a>--}}
    {{--                    </li>--}}
    {{--                </x-nav>--}}
    {{--                <a class="btn btn-outline-light me-2" href="{{route('login')}}">{{__('Login')}}</a>--}}
    {{--                <a class="btn btn-outline-light me-2" href="{{route('register')}}">{{__('Register')}}</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="row py-lg-5 container">--}}
    {{--            <div class="col-lg-6 col-md-8 mx-auto">--}}
    {{--                <h1 class="text-light" style="font-weight: bold">{{__("Repair of vehicles of any complexity")}}</h1>--}}
    {{--                <p class="text-light lead text-body-secondary">{{__('Trust our close-knit team of professionals.')}}</p>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--    </section>--}}

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">Brand</a>

            <!-- Toggle button -->
            <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <!-- Navbar dropdown -->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-mdb-toggle="dropdown"
                            aria-expanded="false"
                        >
                            Dropdown
                        </a>
                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">Action</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider"/>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"
                        >Disabled</a
                        >
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</x-header>
