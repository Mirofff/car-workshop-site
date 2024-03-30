<!doctype html>
<html lang="en">
<head>
    <title>{{__('Login')}}</title>
    @include('includes.head')
</head>
<body class="d-flex flex-column align-items-center justify-content-center py-4 bg-body-tertiary vh-100"
      style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{asset('img/login-page/img.png')}}'); background-repeat:  no-repeat;  background-size: cover">
<div style="background-color: rgba(255, 255, 255, 0.8)" class="d-flex flex-column p-5 m-5 rounded rounded-2">
    <form class="d-flex flex-column" action="{{route("register-action")}}" method="post">
        @csrf
        <center>
            <img src="{{asset('header-logo.png')}}" width="350" alt="">
        </center>
        @csrf
        <h1 class="h3 mb-3 fw-normal">{{__('Please register')}}</h1>
        <p>{{__("Already have account?")}} <a href="{{route('login')}}">{{__('Login')}}</a></p>

        <x-form-group>
            <input type="text" name="last_name" class="form-control" id="last_name">
            <label for="last_name">{{__('Last Name')}}</label>
        </x-form-group>
        <x-form-group>
            <x-form-input type="text" name="first_name" id="first_name"/>
            <x-form-label for="first_name">{{__('First Name')}}</x-form-label>
        </x-form-group>
        <x-form-group>
            <x-form-input type="text" name="second_name" class="form-control" id="second_name"/>
            <x-form-label for="second_name">{{__('Second Name')}}</x-form-label>
        </x-form-group>
        <x-form-group>
            <x-form-input type="email" class="form-control" name="email" id="email"/>
            <x-form-label for="email">{{__('Email')}}</x-form-label>
        </x-form-group>
        <x-form-group>
            <x-form-input type="password" class="form-control" name="password" id="password"/>
            <x-form-label for="password">{{__('Password')}}</x-form-label>
        </x-form-group>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember_me" id="remember_me">
            <label class="form-check-label" for="remember_me">{{__('Remember me')}}</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">{{__('Sign in')}}</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2023–2024</p>
    </form>
</div>
<x-error :errors="$errors"/>
@include('includes.js')
</body>
</html>