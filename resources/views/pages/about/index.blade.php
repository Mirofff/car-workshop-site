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
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Bootstrap</title>
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
        </symbol>
        <symbol id="home" viewBox="0 0 16 16">
            <path
                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
        </symbol>
        <symbol id="speedometer2" viewBox="0 0 16 16">
            <path
                d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
            <path fill-rule="evenodd"
                  d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
        </symbol>
        <symbol id="table" viewBox="0 0 16 16">
            <path
                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
        </symbol>
        <symbol id="people-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd"
                  d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </symbol>
        <symbol id="collection" viewBox="0 0 16 16">
            <path
                d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/>
        </symbol>
        <symbol id="calendar3" viewBox="0 0 16 16">
            <path
                d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
            <path
                d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
        </symbol>
        <symbol id="cpu-fill" viewBox="0 0 16 16">
            <path d="M6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
            <path
                d="M5.5.5a.5.5 0 0 0-1 0V2A2.5 2.5 0 0 0 2 4.5H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2A2.5 2.5 0 0 0 4.5 14v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14a2.5 2.5 0 0 0 2.5-2.5h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14A2.5 2.5 0 0 0 11.5 2V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5zm1 4.5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3A1.5 1.5 0 0 1 6.5 5z"/>
        </symbol>
        <symbol id="gear-fill" viewBox="0 0 16 16">
            <path
                d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
        </symbol>
        <symbol id="speedometer" viewBox="0 0 16 16">
            <path
                d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
            <path fill-rule="evenodd"
                  d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
        </symbol>
        <symbol id="toggles2" viewBox="0 0 16 16">
            <path d="M9.465 10H12a2 2 0 1 1 0 4H9.465c.34-.588.535-1.271.535-2 0-.729-.195-1.412-.535-2z"/>
            <path
                d="M6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm.535-10a3.975 3.975 0 0 1-.409-1H4a1 1 0 0 1 0-2h2.126c.091-.355.23-.69.41-1H4a2 2 0 1 0 0 4h2.535z"/>
            <path d="M14 4a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
        </symbol>
        <symbol id="tools" viewBox="0 0 16 16">
            <path
                d="M1 0L0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/>
        </symbol>
        <symbol id="chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
        </symbol>
        <symbol id="geo-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
        </symbol>
    </svg>
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
            <button class="btn btn-outline-secondary mx-2"><a href="{{route('login')}}"
                                                              class="nav-item nav-link text-light px-2 text-white">{{__('Login')}}</a>
            </button>
            <button class="btn btn-outline-secondary mx-2"><a href="{{route('register')}}"
                                                              class="nav-item nav-link text-light px-2 text-white">{{__('Register')}}</a>
            </button>
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
                    <h3>{{__("Надежные руки")}}</h3>
                    <p class="h5">{{__("Ваш автомобиль – наша забота. Надежный сервис и качественный ремонт")}}</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset("img/slider/second.png")}}" class="d-block carousel-image w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h3>{{__("Большой опыт")}}</h3>
                    <p class="h5">{{__("От мелкого ремонта до капитального – доверяйте профессионалам")}}</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset("img/slider/third.png")}}" class="d-block carousel-image w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h3>{{__("Доступность")}}</h3>
                    <p class="h5">{{__("Скорость, качество, гарантия – всё для вашего авто")}}</p>
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
            <h2 class="my-5" id="about_us">{{__("Why you can trust us?")}}</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{asset("img/icons/fa-wrench.png")}}" height="225" style="object-fit: contain">

                        <div class="card-body">
                            <p class="h3 card-text">{{__('Professionalism')}}</p>
                            <p class="h5 card-text">{{__('Extensive experience with European car brands')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{asset("img/icons/fa-peoples.png")}}" height="225" style="object-fit: contain">

                        <div class="card-body">
                            <p class="h3 card-text">{{__('Personnel')}}</p>
                            <p class="h5 card-text">{{__('A close-knit team of professionals who go above and beyond')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{asset("img/icons/fa-notebook.png")}}" height="225" style="object-fit: contain">

                        <div class="card-body">
                            <p class="h3 card-text">{{__('Work guarantee')}}</p>
                            <p class="h5 card-text">{{__('Always on your side, 5000km or six months warranty on work and parts')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="container px-4 py-5" id="hanging-icons">
            <h2 class="pb-2 border-bottom">{{__('Спектр услуг')}}</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#tools"></use>
                        </svg>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">{{__('Замена масла')}}</h3>
                        <p>{{__('Профессиональная замена моторного масла и масляных фильтров')}}</p>
                        <img class="img-fluid m-auto" src="{{asset('img/maslo.png')}}" alt="">
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#tools"></use>
                        </svg>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">{{__('Тормозная система')}}</h3>
                        <p>{{__('Диагностика и ремонт тормозной системы, замена тормозных колодок и дисков')}}</p>
                        <img class="img-fluid m-auto" src="{{asset('img/tormoz.png')}}" alt="">
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#tools"></use>
                        </svg>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">{{__('Подвеска')}}</h3>
                        <p>{{__('Ремонт и замена элементов подвески: амортизаторы, пружины, сайлентблоки')}}</p>
                        <img class="img-fluid m-auto" src="{{asset('img/choto.png')}}" alt="">
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#tools"></use>
                        </svg>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">{{__('Двигатель')}}</h3>
                        <p>{{__('Диагностика и ремонт двигателя, замена ремней ГРМ, свечей зажигания и др.')}}</p>
                        <img class="img-fluid m-auto" src="{{asset('img/engine.png')}}" alt="">
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#tools"></use>
                        </svg>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">{{__('Кондиционер')}}</h3>
                        <p>{{__('Обслуживание и ремонт кондиционеров, заправка фреона')}}</p>
                        <img class="img-fluid m-auto" src="{{asset('img/conditioner.png')}}" alt="">
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#tools"></use>
                        </svg>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">{{__('Трансмиссия')}}</h3>
                        <p>{{__('Ремонт и замена элементов трансмиссии: сцепление, коробка передач')}}</p>
                        <img class="img-fluid m-auto" src="{{asset('img/analyze.png')}}" alt="">
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#tools"></use>
                        </svg>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">{{__('Шины и колеса')}}</h3>
                        <p>{{__('Шиномонтаж, балансировка колес, замена и ремонт шин')}}</p>
                        <img class="img-fluid m-auto" src="{{asset('img/protector.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 text-center"
         style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{asset('img/about-background.png')}}'); background-repeat:  no-repeat;  background-size: cover">
        <div class="col-md-6 p-lg-5 mx-auto my-5">
            <h1 class="display-3 text-light fw-bold">{{__('Как записаться на прием?')}}</h1>
            <h3 class="fw-normal text-light mb-3">{{__('Пройдите реигистрацию, или войдите в существующий аккаунт')}}</h3>
            <div class="d-flex gap-3 justify-content-center lead fw-normal">
                <a class="h4 icon-link text-light" href="{{route('login')}}">
                    {{__('Логин')}}
                </a>
                <a class="h4 icon-link text-light icon-link-hover" href="{{route('register')}}">
                    {{__('Регистрация')}}
                </a>
            </div>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>

    <footer class="bg-dark text-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>{{__('Контактная информация')}}</h5>
                    <ul class="list-unstyled">
                        <li>
                            <strong>{{__('Адрес:')}}</strong> {{__('ул. Пушкина, д. Колотушкина, г. Калининград, Россия')}}
                        </li>
                        <li><strong>{{__('Телефон:')}}</strong> <a href="tel:+88005553535"
                                                                   class="text-light">{{__('+8 800 555 35 35')}}</a></li>
                        <li><strong>{{__('Email:')}}</strong> <a href="mailto:info@car-workshop.com"
                                                                 class="text-light">{{__('info@car-workshop.com')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>{{__('Часы работы')}}</h5>
                    <ul class="list-unstyled">
                        <li>{{__('Понедельник - Пятница:')}} 8:00 - 18:00</li>
                        <li>{{__('Суббота:')}} 9:00 - 14:00</li>
                        <li>{{__('Воскресенье:')}} {{__('Выходной')}}</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>{{__('Полезные ссылки')}}</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">{{__('О нас')}}</a></li>
                        <li><a href="#" class="text-light">{{__('Услуги')}}</a></li>
                        <li><a href="#" class="text-light">{{__('Контакты')}}</a></li>
                        <li><a href="#" class="text-light">{{__('Политика конфиденциальности')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col text-center">
                    <p>&copy; {{__('2024 Автомастерская')}}. {{__('Все права защищены.')}}</p>
                    <p>{{__('Следите за нами в социальных сетях:')}}</p>
                    <a href="#" class="text-light me-2"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-light me-2"><i class="bi bi-x"></i></a>
                    <a href="#" class="text-light me-2"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-light"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>

@endsection
