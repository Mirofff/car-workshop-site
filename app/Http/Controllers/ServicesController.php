<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __invoke(string $id = null)
    {
        return view(
            'pages.admin.handbooks.services.index',
            [
                'services' => Service::all(),
            ]
        );
    }

    public function post(Request $request)
    {
        Service::updateOrCreate(['id' => $request['id']], ["name" => $request['name'], "price" => $request['price']]);
        return to_route('admin.services');
    }

    public function put(Request $request)
    {

        Service::updateOrCreate(['id' => $request['id']], ["name" => $request['name'], "price" => $request['price']]);
        return to_route('admin.services');
    }

    public function delete(Request $request)
    {

        Service::whereId($request['id'])->delete();
        return to_route('admin.services');
    }
}
