<?php

namespace App\Http\Controllers;

use App\Models\Consumable;

class ConsumablesController extends Controller
{
    public function __invoke()
    {
        return view('components.table', ['items' => Consumable::all(), 'get_route' => 'consumable.get', 'id_column' => 'id']);
    }
}
