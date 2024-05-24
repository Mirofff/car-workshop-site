@extends('layouts.default')

@section('page.title')
    {{__('About')}}
@append

@section('page.style')
    <style>
        .transparent-header {
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 10;
            background-color: rgba(0, 0, 0, 0.7); /* Прозрачный белый фон */
        }

        .carousel-image {
            height: 100vh;
            object-fit: cover;
        }
    </style>
@stop

@section('content')
    <header class="d-flex transparent-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
                <div class="nav-item">
                    <a href="/" class="nav-item pe-5 text-light text-decoration-none navbar-brand">
                        <img class="d-inline-block align-top" src="{{asset('header-logo.png')}}"
                             height="60"
                             style="filter: invert(1)"
                        >
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#about_us"
                       class="nav-item nav-link text-light px-2 text-white {{ Route::is('requests') ? 'active' : '' }}">{{__('Requests')}}</a>
                </div>
                <div class="nav-item">
                    <a href=""
                       class="nav-item dropdown nav-link text-light px-2 text-white {{ Route::is('vehicles') ? 'active' : '' }}">{{__('Vehicles')}}</a>
                </div>
            </nav>
        </div>
        <div class="d-flex m-auto">
            <button class="btn btn-outline-secondary mx-2"><a href="{{route('login')}}" class="nav-item nav-link text-light px-2 text-white">{{__('Login')}}</a></button>
            <button class="btn btn-outline-secondary mx-2"><a href="{{route('register')}}" class="nav-item nav-link text-light px-2 text-white">{{__('Register')}}</a></button>
        </div>
    </header>

    <div id="carouselExampleCaptions" class="carousel slide vh-100">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner vh-100">
            <div class="carousel-item active">
                <img src="{{asset("img/slider/first.png")}}" class="d-block carousel-image w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{__("Надежные руки")}}</h5>
                    <p>{{__("Ваш автомобиль – наша забота. Надежный сервис и качественный ремонт")}}</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset("img/slider/second.png")}}" class="d-block carousel-image w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{__("Большой опыт")}}</h5>
                    <p>{{__("От мелкого ремонта до капитального – доверяйте профессионалам")}}</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset("img/slider/third.png")}}" class="d-block carousel-image w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{__("Доступность")}}</h5>
                    <p>{{__("Скорость, качество, гарантия – всё для вашего авто")}}</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <h2 class="m-3" id="about_us">{{__("Why you can trust us?")}}</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{asset("img/icons/fa-wrench.png")}}" height="225" style="object-fit: contain">

                        <div class="card-body">
                            <p class="card-text">{{__('Professionalism')}}</p>
                            <p class="card-text">{{__('Extensive experience with European car brands')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{asset("img/icons/fa-peoples.png")}}" height="225" style="object-fit: contain">

                        <div class="card-body">
                            <p class="card-text">{{__('Personnel')}}</p>
                            <p class="card-text">{{__('A close-knit team of professionals who go above and beyond')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{asset("img/icons/fa-notebook.png")}}" height="225" style="object-fit: contain">

                        <div class="card-body">
                            <p class="card-text">{{__('Work guarantee')}}</p>
                            <p class="card-text">{{__('Always on your side, 5000km or six months warranty on work and parts')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
