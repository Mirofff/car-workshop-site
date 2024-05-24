<?php

namespace App\Http\Controllers;

use App\Http\Requests\PutConsumableRequest;
use App\Models\Consumable;

class ConsumablesController extends Controller
{
    public function __invoke(string $id = null)
    {
        if ($id) {
            $current_consumable = Consumable::whereId($id)->firstOrFail();
        } else {
            $current_consumable = null;
        }

        return view(
            'admin.page.consumable',
            [
                'consumables' => Consumable::all(),
                'current_consumable' => $current_consumable
            ]
        );
    }

    public function put(PutConsumableRequest $request)
    {

        Consumable::updateOrCreate(['id' => $request->consumable_id], $request->validated());
        return to_route('admin.consumables');
    }
}

