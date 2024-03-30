<!doctype html>
<html lang="en">
<head>
    <title>{{__('Admin Login')}}</title>
    @include('includes.head')
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary vh-100">
<main class="w-100 m-auto" style="max-width: 330px">
    <form action="{{route("admin.login")}}" method="post">
        @csrf

        <h1 class="h3 mb-3 fw-normal">{{__("Please sign in")}}</h1>
        <p>{{__("Have no account?")}} <a href="{{route('register')}}">{{__('Register')}}</a></p>

        <div class="form-floating">
            <input type="email" class="form-control" id="email" name="email">
            <label for="email">{{__("Email address")}}</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password">
            <label for="password">{{__('Password')}}</label>
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">{{__("Remember me")}}</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">{{__("Sign in")}}</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2023–2024</p>
    </form>
</main>
@include('includes.js')
</body>
</html>