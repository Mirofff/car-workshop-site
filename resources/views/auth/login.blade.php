@include('head')

<style>
    html,
    body {
        height: 100%;
    }

    .form-signin {
        width: 330px;
        padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>

<body class="py-4 bg-body-tertiary">
    <main class="form-signin d-flex justify-content-center align-items-center m-auto">
        <form class="w-330" method="post" action="{{ config('constants.HOME_PAGE_URL_LOGIN_ACTION') }}">
            @csrf

            <img class="mb-4" src="img/logo.svg" width="100%" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput"
                    placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
        </form>
        {!! $errors->first('email', '<div class="error-block">:message</div>') !!}
    </main>

</body>

</html>

@include('footer')
