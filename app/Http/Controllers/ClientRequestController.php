<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequestRequest;
use App\Models\Statement;
use App\Models\UsedConsumable;
use App\Models\UsedService;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ClientRequestController extends Controller
{
    public function __invoke()
    {
        return view(
            'pages.requests.index',
            [
                'vehicles' => Vehicle::whereClientId(Auth::guard('client')->id())->get(),
                'requests' => Statement::whereClientId(Auth::guard('client')->id())->get(),
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
