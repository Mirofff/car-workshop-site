<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequestRequest;
use App\Models\Client;
use App\Models\Statement;
use App\Models\UsedConsumable;
use App\Models\UsedService;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientRequestController extends Controller
{
    public function __invoke()
    {
        return view(
            'pages.requests.index',
            [
                'user' => Client::whereId(Auth::guard('client')->id())->first(),
                'vehicles' => Vehicle::whereClientId(Auth::guard('client')->id())->get(),
                'requests' => Statement::whereClientId(Auth::guard('client')->id())
                                       ->orderBy('pickup_date', 'desc')
                                       ->orderBy('pickup_time', 'desc')
                                       ->get(),
            ]
        );
    }

    public function post(PostRequestRequest $request)
    {
        Statement::create($request->validated());
        return back();
    }

    public function discard(Request $req)
    {
        Statement::whereId($req->statementId)->delete();
        UsedConsumable::whereStatementId($req->statementId)->delete();
        UsedService::whereStatementId($req->statementId)->delete();
        return back();
    }
}
