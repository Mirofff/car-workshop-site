<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginPageController extends Controller
{
    public function __invoke()
    {
        return view('auth.login', ['title' => 'Login']);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)):
            return redirect(config('constants.HOME_PAGE_URL'))
                ->withErrors("Wrong password!!!!!");
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return redirect(config('constants.HOME_PAGE_URL'));
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}
