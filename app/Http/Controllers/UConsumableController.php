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


    public function put(string $uuid, string $statement_uuid)
    {
        $existed = UsedConsumable::where(['statement_uuid' => $statement_uuid, 'consumable_uuid' => $uuid])->first();
        if ($existed) {
            $existed->increment('quantity');
           }
        else{
            UsedConsumable::create(['statement_uuid' => $statement_uuid, 'consumable_uuid' => $uuid]);
        }
        return back();
    }

    public function delete(string $uuid) {
        UsedConsumable::whereUuid($uuid)->delete();
        return back();
    }
}
