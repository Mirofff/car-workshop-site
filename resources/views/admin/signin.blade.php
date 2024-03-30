<x-layout>
    <style>
        html,
        body {
            height: 100%;
        }

        .form-login {            max-width: 330px;
            padding: 1rem;
        }

        .form-login .form-floating:focus-within {
            z-index: 2;
        }

        .form-login input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-login input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

    </style>
    <main class="form-login m-auto">
        <form class="h-75" action="{{route('admin.login')}}" method="post">
            @csrf
            <h1 class="h3 mb-3 fw-normal">{{__('Please sign in')}}</h1>

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                <label for="email">{{__('Email')}}</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="password">{{__('Password')}}</label>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    {{__('Remember me')}}
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">{{__('Sign in')}}</button>
        </form>
    </main>
    <x-error/>
</x-layout>
