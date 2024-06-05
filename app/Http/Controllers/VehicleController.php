<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostVehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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

    public function delete(int $id): RedirectResponse
    {
        $vehicle = Vehicle::whereId($id)->get()->first();

        if (Auth::guard('client')->user()->id !== $vehicle->client_id) {
            abort(403);
        }

        $vehicle->delete();
        return back();
    }
}

