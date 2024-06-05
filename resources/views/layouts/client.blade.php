<!doctype html>
<html lang="en">
<head>
    <title>@yield('page.title', config("app.name"))</title>
    @include('includes.head')
    @include('includes.js')
</head>
<body>
<div class="d-flex flex-column min-vh-100">
    <header class="d-flex">
        <div class="d-flex w-100 justify-content-between" style="height: 67px; background: rgba(0, 0, 0, 0.8)">
            <div class="d-flex container align-items-center">
                <x-nav>
                    <a href="/" class="pe-5 text-light text-decoration-none navbar-brand">
                        <img class="d-inline-block text-li align-top" src="{{asset('header-logo.png')}}" height="60"
                             alt=""
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
            @php
                $user = Auth::guard('client')->user();
                $userName = sprintf('%s %s. %s.', $user->last_name, mb_substr($user->first_name, 0, 1), mb_substr($user->second_name, 0, 1));
            @endphp
            <div class="d-flex text-light align-items-center">
                <a style="font-size: 18px; text-decoration: none; color: black; background-color: #ffffff" class="m-auto p-2 mx-3 rounded rounded-2" data-bs-toggle="modal"
                   data-bs-target="#showClientProfile">{{$userName}}</a>
                <div class="modal fade" id="showClientProfile" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            @php
                                $user = Auth::guard('client')->user();
                            @endphp
                            <form action="{{route('client.put', ['id' => $user->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header text-center">
                                    <h1 class="modal-title text-dark fs-5"
                                        id="exampleModalLabel">{{__("Личная информация")}}</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="form-control">
                                        <div class="form-floating my-2">
                                            <input type="text" class="form-control" name="last_name"
                                                   value="{{$user->last_name}}" id="last_name">
                                            <label for="last_name">{{__('Фамилия')}}</label>
                                        </div>
                                        <div class="form-floating my-2">
                                            <input type="text" class="form-control" name="first_name"
                                                   value="{{$user->first_name}}" id="first_name">
                                            <label for="first_name">{{__('Имя')}}</label>
                                        </div>
                                        <div class="form-floating my-2">
                                            <input type="text" class="form-control" name="second_name"
                                                   value="{{$user->second_name}}" id="second_name">
                                            <label for="second_name">{{__('Отчество')}}</label>
                                        </div>
                                        <div class="form-floating my-2">
                                            <input type="email" class="form-control" name="email"
                                                   value="{{$user->email}}" id="email">
                                            <label for="email">{{__('Почта')}}</label>
                                        </div>
                                        <div class="form-floating my-2">
                                            <input type="password" class="form-control" name="password" id="password" autocomplete="new-password">
                                            <label for="password">{{__('Пароль')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col">
                                                <button type="button" class="btn btn-outline-secondary w-100"
                                                        data-bs-dismiss="modal">{{__("Закрыть")}}</button>
                                            </div>
                                            <div class="col">
                                                <button type="submit"
                                                        name="id"
                                                        value="{{Auth::guard('client')->user()->id}}"
                                                        class="btn btn-outline-primary w-100">{{__("Сохранить изменения")}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <main class="flex-grow-1 d-flex flex-column">
        @yield('content')
    </main>
</div>
</body>
</html>
