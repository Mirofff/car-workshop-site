<x-layout>
    <style>
        html,
        body {
            height: 100%;
        }

        .form-signin {
            max-width: 330px;
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
    <main class="form-signin m-auto">
        <form action="{{route('signin')}}" method="post">
            @csrf
            <h1 class="h3 mb-3 fw-normal">{{__('Please Sign Up')}}</h1>

            <div class="form-floating">
                <input name="last_name" class="form-control" id="last_name" type="text">
                <label for="last_name">{{__('Last Name')}}</label>
            </div>

            <div class="form-floating">
                <input name="first_name" class="form-control" id="first_name" type="text">
                <label for="first_name">{{__('First Name')}}</label>
            </div>

            <div class="form-floating">
                <input name="second_name" class="form-control" id="second_name" type="text">
                <label for="second_name">{{__('Second Name')}}</label>
            </div>

            <div class="form-floating">
                <input name="email" class="form-control" id="email" type="email">
                <label for="email">{{__('Email')}}</label>
            </div>

            <div class="form-floating">
                <input name="password" class="form-control" id="password" type="password">
                <label for="password">{{__('Password')}}</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">{{__('Register')}}</button>
        </form>
    </main>
    <x-error/>
</x-layout>