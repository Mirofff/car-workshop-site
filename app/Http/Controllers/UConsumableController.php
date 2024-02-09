<?php

namespace App\Http\Controllers;

use App\Models\UsedConsumable;

class UConsumableController extends Controller
{
    public function __invoke()
    {
        return view('components.table', ['items' => UsedConsumable::all(), 'get_route' => 'uconsumable.get', 'id_column' => 'uuid']);
    }
}
