<?php

namespace App\Http\Controllers;

use App\Models\Stuff;

class StuffController extends Controller
{
    public function __invoke()
    {
        return view('panel.entities.stuff', ['items' => Stuff::all()]);
    }
}
