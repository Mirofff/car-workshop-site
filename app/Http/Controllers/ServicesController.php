<?php

namespace App\Http\Controllers;

use App\Http\Requests\PutServiceRequest;
use App\Models\Service;

class ServicesController extends Controller
{
    public function __invoke(string $id = null)
    {
        if ($id) {
            $current_service = Service::whereId($id)->firstOrFail();
        } else {
            $current_service = null;
        }

        return view(
            'admin.page.service',
            [
                'services' => Service::all(),
                'current_service' => $current_service
            ]
        );
    }

    public function put(PutServiceRequest $request)
    {

        Service::updateOrCreate(['id' => $request->service_id], $request->validated());
        return to_route('admin.services');
    }
}
