<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\RegisterRequest;

class RegistrationController extends Controller
{
    public function __invoke()
    {
        return view('auth.register', ['title' => 'Registration']);
    }
    public function register(RegisterRequest $request)
    {
        $user = Client::create($request->validated());

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered!");
    }
}
