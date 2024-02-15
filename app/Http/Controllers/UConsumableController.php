<?php

namespace App\Http\Controllers;

use App\Models\UsedConsumable;
use Illuminate\Support\Facades\Schema;

class UConsumableController extends Controller
{
    public function __invoke()
    {
        return view('components.table',
            ['items' => UsedConsumable::all(),
             'columns' => Schema::getColumnListing('used_consumables'),
             'get_route' => 'uconsumable.get',
             'id_column' => 'uuid']);
    }
}
