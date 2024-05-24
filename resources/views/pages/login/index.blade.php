<!doctype html>
<html lang="en">
<head>
    <title>{{__('Login')}}</title>
    @include('includes.head')
</head>
<body class="d-flex flex-column align-items-center justify-content-center py-4 bg-body-tertiary vh-100"
      style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{asset('img/login-page/img.png')}}'); background-repeat:  no-repeat;  background-size: cover">
<div style="background-color: rgba(245, 245, 245, 0.8)" class="d-flex flex-column p-5 m-5 rounded rounded-2">
    <form class="d-flex flex-column" action="{{route("login-action")}}" method="post">
        @csrf
        <center>
            <img src="{{asset('header-logo.png')}}" width="350" alt="">
        </center>
        <h1 class="h3 mb-3 fw-normal">{{__("Please sign in")}}</h1>
        <p>{{__("Have no account?")}} <a href="{{route('register')}}">{{__('Register')}}</a></p>

        <x-form-group>
            <input type="email" class="form-control" id="email" name="email">
            <label for="email">{{__("Email address")}}</label>
        </x-form-group>
        <x-form-group>
            <input type="password" class="form-control" id="password" name="password">
            <label for="password">{{__('Password')}}</label>
        </x-form-group>

        <button class="btn btn-primary w-100 py-2" type="submit">{{__("Sign in")}}</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2023–2024</p>
    </form>
</div>
<x-error :errors="$errors"/>
@include('includes.js')
</body>
</html>
