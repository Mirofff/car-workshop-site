<?php

namespace App\Http\Controllers;

use App\Http\Requests\PutConsumableRequest;
use App\Models\Consumable;

class ConsumablesController extends Controller
{
    public function __invoke(string $uuid = null)
    {
        if ($uuid) {
            $current_consumable = Consumable::whereUuid($uuid)->firstOrFail();
        } else {
            $current_consumable = null;
        }

        return view('admin.page.consumable',
            ['consumables' => Consumable::all(),
             'current_consumable' => $current_consumable]);
    }

    public function put(PutConsumableRequest $request)
    {

        Consumable::updateOrCreate(['uuid' => $request->consumable_uuid], $request->validated());
        return to_route('admin.consumables');
    }
}

