<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\PutUserStuff;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __invoke()
    {
        return view('panel.entities.users', ['items' => User::all()]);
    }

    public function registration(RegisterRequest $request): RedirectResponse
    {
        Auth::login(User::create($request->validated())->make());
        return redirect('login');
    }

    public function authentication(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated(), true)) {
            $request->session()->regenerate();
            return redirect()->intended('about');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function get(Request $request, string $uuid)
    {
        return view('panel.page.user', ['item' => User::find($uuid)]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('about');
    }

    public function put(PutUserStuff $request, string $uuid)
    {
        User::find($uuid)->update($request->validated());
        return back();
    }

    public function update(UpdateRequest $request)
    {
        Auth::user()->update($request->validated());
        return back();
    }

}
