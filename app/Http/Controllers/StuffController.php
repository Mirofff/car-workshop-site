<?php

namespace App\Http\Controllers;

use App\Models\Stuff;

class StuffController extends Controller
{
    public function __invoke()
    {
        return view('components.table', ['items' => Stuff::all(), 'get_route' => 'stuff.get', 'id_column' => 'uuid']);
    }
}
