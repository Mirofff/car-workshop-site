<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequestRequest;
use App\Models\Request;
use App\Models\Statement;

class AdminRequestController extends Controller
{
    public function __invoke()
    {
        return view(
            'pages.admin.requests.index',
            [
                'statements' => Statement::orderBy('created_at', 'desc')->paginate(15),
            ]
        );
    }

    public function post(PostRequestRequest $request)
    {
        Request::create($request->validated());
        return back();
    }
}
