<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatementRequest;
use App\Http\Requests\UpdateStatementRequest;
use App\Models\Statement;

class StatementController extends Controller
{
    public function __invoke()
    {
        return view('components.table', ['items' => Statement::all(), 'get_route' => 'statement.get', 'id_column' => 'uuid']);
    }
}
