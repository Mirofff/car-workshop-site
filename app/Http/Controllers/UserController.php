<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\PutUserStuff;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    public function __invoke()
    {
        return view('components.table',
            ['items' => User::all(),
             'columns' => Schema::getColumnListing('users'),
             'get_route' => 'user.get',
             'id_column' => 'uuid']);
    }

    public function signup(RegisterRequest $request): RedirectResponse
    {
        Auth::login(User::create($request->validated())->make());
        return redirect('signin');
    }

    public function signin(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated(), true)) {
            $request->session()->regenerate();
            return redirect()->intended('about');
        }

        return back()->withErrors([
            'email' => __('The provided credentials do not match our records.'),
        ])->onlyInput('email');
    }

    public function get(string $uuid)
    {
        return view('admin.page.user', ['item' => User::find($uuid)]);
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
}
