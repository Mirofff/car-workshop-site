<?php

namespace App\Http\Controllers;

use App\Models\UsedConsumable;
use Illuminate\Support\Facades\Schema;

class UConsumableController extends Controller
{
    public function __invoke()
    {
        return view(
            'components.table',
            [
                'items' => UsedConsumable::all(),
                'columns' => Schema::getColumnListing('used_consumables'),
                'get_route' => 'uconsumable.get',
                'id_column' => 'id'
            ]
        );
    }


    public function put(string $id, string $statement_id)
    {
        $existed = UsedConsumable::where(['statement_id' => $statement_id, 'consumable_id' => $id])->first();
        if ($existed) {
            $existed->increment('quantity');
        } else {
            UsedConsumable::create(['statement_id' => $statement_id, 'consumable_id' => $id]);
        }
        return back();
    }

    public function delete(string $id)
    {
        $existed = UsedConsumable::whereId($id)->firstOrFail();
        if ($existed->quantity > 1) {
            $existed->decrement('quantity');
        } else {
            $existed->delete();
        }
        return back();
    }
}
