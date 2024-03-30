<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequestRequest;
use App\Models\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class ClientRequestController extends Controller
{
    public function __invoke()
    {
        return view('pages.requests.index',
            [
                'vehicles' => Vehicle::whereClientUuid(Auth::guard('client')->id())->get(),
                'requests' => Request::whereClientUuid(Auth::guard('client')->id())->get(),
            ]);
    }

    public function post(PostRequestRequest $request)
    {
        Request::create($request->validated());
        return back();
    }
}
