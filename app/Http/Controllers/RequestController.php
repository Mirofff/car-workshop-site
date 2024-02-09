<?php

namespace App\Http\Controllers;

use App\Models\Request as StatementRequest;

class RequestController extends Controller
{
    public function __invoke()
    {
        return view('panel.entities.requests', ['items' => StatementRequest::all()]);
    }
}
