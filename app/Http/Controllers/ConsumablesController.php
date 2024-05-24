<?php

namespace App\Http\Controllers;

use App\Models\Consumable;
use Illuminate\Http\Request;

class ConsumablesController extends Controller
{
    public function __invoke()
    {
        return view(
            'pages.admin.handbooks.consumables.index',
            [
                'consumables' => Consumable::all(),
            ]
        );
    }

    public function post(Request $request)
    {
        Consumable::updateOrCreate(
            ['id' => $request['id']],
            ["name" => $request['name'], "price" => $request['price']]
        );
        return to_route('admin.services');
    }

    public function put(Request $request)
    {

        Consumable::updateOrCreate(
            ['id' => $request['id']],
            ["name" => $request['name'], "price" => $request['price']]
        );
        return to_route('admin.services');
    }

    public function delete(Request $request)
    {

        Consumable::whereId($request['id'])->delete();
        return to_route('admin.services');
    }
}

