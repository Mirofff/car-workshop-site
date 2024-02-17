<?php

namespace App\Http\Controllers;

use App\Models\UsedService;
use Illuminate\Support\Facades\Schema;

class UServiceController extends Controller
{
    public function __invoke()
    {
        return view('components.table',
            ['items' => UsedService::all(),
             'columns' => Schema::getColumnListing('used_services'),
             'get_route' => 'uservice.get',
             'id_column' => 'uuid']);
    }

    public function put(string $uuid, string $statement_uuid)
    {
        $existed = UsedService::where(['statement_uuid' => $statement_uuid, 'service_uuid' => $uuid])->first();
        if ($existed) {
            $existed->increment('quantity');
        }
        else{
            UsedService::create(['statement_uuid' => $statement_uuid, 'service_uuid' => $uuid]);
        }
        return back();
    }

    public function delete(string $uuid) {
        $used_service = UsedService::whereUuid($uuid)->firstOrFail();

        if ($used_service->quantity > 1) {
            $used_service->decrement('quantity');
        } else {
            $used_service->delete();
        }

        return back();
    }
}
