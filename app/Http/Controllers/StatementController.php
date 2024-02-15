<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStatement;
use App\Models\Request;
use App\Models\Statement;
use Illuminate\Support\Facades\Schema;

class StatementController extends Controller
{
    public function __invoke()
    {
        return view('components.table',
            ['items' => Statement::all(),
             'columns' => Schema::getColumnListing('statements'),
             'get_route' => 'statement.get',
             'id_column' => 'uuid']);
    }

    public function post(PostStatement $request, string $request_uuid) {
        $request->merge(['request_uuid' => $request_uuid]);

        $statement = Statement::create($request->validated());

        return view('admin.page.statement', [
            'request_uuid' => $request_uuid,
            'statement_uuid' => $statement->uuid,
        ]);
    }
}
