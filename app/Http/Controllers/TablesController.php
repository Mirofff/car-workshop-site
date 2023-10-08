<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TablesController extends Controller
{
    public function __invoke()
    {
        return view('tables.sidebar', ['title' => 'Tables']);
    }
}
