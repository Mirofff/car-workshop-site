<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        return view('home', ['user' => $user, 'title' => 'Home']);
    }

    public function logout()
    {
        $user = Auth::logout();
        return view('home', ['user' => $user, 'title' => 'Home']);
    }
}
