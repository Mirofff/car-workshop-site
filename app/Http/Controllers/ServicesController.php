<?php

namespace App\Http\Controllers;

use App\Http\Requests\PutServiceRequest;
use App\Models\Service;

class ServicesController extends Controller
{
    public function __invoke(string $uuid = null)
    {
        if ($uuid) {
            $current_service = Service::whereUuid($uuid)->firstOrFail();
        } else {
            $current_service = null;
        }

        return view('admin.page.service',
            ['services' => Service::all(),
             'current_service' => $current_service]);
    }

    public function put(PutServiceRequest $request)
    {

        Service::updateOrCreate(['uuid' => $request->service_uuid], $request->validated());
        return to_route('admin.services');
    }
}
