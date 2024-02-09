<?php

namespace App\Http\Controllers;

use App\Models\Consumable;

class ConsumablesController extends Controller
{
    public function __invoke()
    {
        return view('panel.entities.consumables', ['items' => Consumable::all()]);
    }
}
