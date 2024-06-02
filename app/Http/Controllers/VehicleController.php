<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostVehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Client\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class VehicleController extends Controller
{
    public function __invoke()
    {
        return view(
            'pages.vehicles.index',
            [
                'vehicles' => Vehicle::whereClientId(Auth::guard('client')->id())->get(),
            ]
        );
    }

    public function post(PostVehicleRequest $request): RedirectResponse
    {
        Vehicle::create($request->validated());
        return back();
    }

    public function delete(Request $req): RedirectResponse
    {
        $vehicle = Vehicle::whereId($req->id);

        if (!Gate::allows('delete-vehicle', $vehicle)) {
            abort(404);
        }
        $vehicle->delete();
        return back();
    }
}
