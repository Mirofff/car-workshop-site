<?php

namespace App\Http\Controllers;

use App\Models\UsedService;
use Illuminate\Support\Facades\Schema;

class UServiceController extends Controller
{
    public function __invoke()
    {
        return view(
            'components.table',
            [
                'items' => UsedService::all(),
                'columns' => Schema::getColumnListing('used_services'),
                'get_route' => 'uservice.get',
                'id_column' => 'id'
            ]
        );
    }

    public function put(string $id, string $statement_id)
    {
        $existed = UsedService::where(['statement_id' => $statement_id, 'service_id' => $id])->first();
        if ($existed) {
            $existed->increment('quantity');
        } else {
            UsedService::create(['statement_id' => $statement_id, 'service_id' => $id]);
        }
        return back();
    }

    public function delete(string $id)
    {
        $used_service = UsedService::whereId($id)->firstOrFail();

        if ($used_service->quantity > 1) {
            $used_service->decrement('quantity');
        } else {
            $used_service->delete();
        }

        return back();
    }
}
