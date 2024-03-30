<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequestRequest;
use App\Models\Request;

class AdminRequestController extends Controller
{
    public function __invoke()
    {
        return view('pages.admin.requests.index',
            [
                'requests' => Request::orderBy('created_at', 'desc')->get(),
            ]);
    }

    public function post(PostRequestRequest $request)
    {
        Request::create($request->validated());
        return back();
    }
}
