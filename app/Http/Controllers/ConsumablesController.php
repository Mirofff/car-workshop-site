<?php

namespace App\Http\Controllers;

use App\Models\Consumable;
use Illuminate\Support\Facades\Schema;

class ConsumablesController extends Controller
{
    public function __invoke()
    {
        return view('components.table',
            ['items' => Consumable::all(),
             'columns' => Schema::getColumnListing('consumables'),
             'get_route' => 'consumable.get',
             'id_column' => 'id']);
    }
}
