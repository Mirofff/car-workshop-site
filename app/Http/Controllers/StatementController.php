<?php

namespace App\Http\Controllers;

use App\Enums\StatementStatus;
use App\Http\Requests\PostStatement;
use App\Models\Statement;
use App\Models\UsedConsumable;
use App\Models\UsedService;
use Illuminate\Support\Facades\Schema;

class StatementController extends Controller
{
    public function __invoke()
    {
        return view('components.table',
            [
                'items' => Statement::all(),
                'columns' => Schema::getColumnListing('statements'),
                'get_route' => 'statement.get',
                'id_column' => 'uuid',
            ]);
    }

    public function save(string $uuid)
    {
        $statement = Statement::whereUuid($uuid)->firstOrFail();
        $statement->status = StatementStatus::Complete;
    }

    public function post(PostStatement $request, string $request_uuid)
    {
        $statement = Statement::create([...$request->validated(), 'request_uuid' => $request_uuid]);

        return to_route('statement.get', ['uuid' => $statement->uuid]);
    }

    public function get(string $uuid)
    {
        $statement = Statement::whereUuid($uuid)->firstOrFail();
        $uconsumables = UsedConsumable::where(['statement_uuid' => $statement->uuid])->get();
        $uservices = UsedService::where(['statement_uuid' => $statement->uuid])->get();

        return view('admin.page.statement',
            [
                'request_uuid' => $statement->request_uuid,
                'user_uuid' => $statement->user_uuid,
                'statement_uuid' => $statement->uuid,
                'vehicle_uuid' => $statement->vehicle_uuid,
                'uconsumables' => $uconsumables,
                'uservices' => $uservices,
            ]);
    }
}
