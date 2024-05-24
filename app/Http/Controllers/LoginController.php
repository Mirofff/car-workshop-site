<?php

namespace App\Http\Controllers;


use App\Http\Requests\StuffLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke()
    {
        return view('pages.admin.login.index');
    }

    public function login(StuffLoginRequest $request)
    {
        Auth::logout();
        Auth::guard('client')->logout();


        if (Auth::attempt($request->validated(), true)) {
            $request->session()->regenerate();
            return to_route('admin');
        }

        return back()->withErrors(
            [
                'email' => __('The provided credentials do not match our records.'),
            ]
        )->onlyInput('email');
    }
}
