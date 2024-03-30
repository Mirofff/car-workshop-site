<x-header>
    <section class="d-flex flex-column text-center w-100"
             style="background-image: linear-gradient( rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4) ),  url('{{asset('img/slider/second.png')}}'); background-repeat: no-repeat; background-size: cover; height: 370px">
        <div class="d-flex w-100 justify-content-between" style="height: 67px; background: rgba(0, 0, 0, .65)">
            <div class="d-flex container align-items-center">
                <a href="/" class="pe-5 text-light text-decoration-none navbar-brand">
                    <img class="d-inline-block align-top" src="{{asset('header-logo.png')}}" height="60" alt="" style="filter: invert(1)">
                </a>

                <x-nav>
                    {{--            <a class="navbar-brand" href="#">{{ __("Car Workshop") }}</a>--}}
                    {{--            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"--}}
                    {{--                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">--}}
                    {{--                <span class="navbar-toggler-icon"></span>--}}
                    {{--            </button>--}}
                    <li class="nav-item">
                        <a class="nav-link text-light active" aria-current="page" href="#">{{__("Home")}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">{{__('Specialists')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-disabled="true">{{__("Workshops Info")}}</a>
                    </li>
                </x-nav>
                <a class="btn btn-outline-light me-2" href="{{route('login')}}">{{__('Login')}}</a>
                <a class="btn btn-outline-light me-2" href="{{route('register')}}">{{__('Register')}}</a>
            </div>
        </div>
        <div class="row py-lg-5 container">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="text-light" style="font-weight: bold">{{__("Repair of vehicles of any complexity")}}</h1>
                <p class="text-light lead text-body-secondary">{{__('Trust our close-knit team of professionals.')}}</p>
            </div>
        </div>

    </section>
</x-header>
