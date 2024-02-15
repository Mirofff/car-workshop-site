<?php

namespace App\Http\Controllers;

use App\Models\Model;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function __invoke()
    {
        return view('components.table', ['items' => Model::all(), 'get_route' => 'model.get', 'id_column' => 'id']);
    }

    public function get(Request $request, string $id)
    {
        return view('admin.page.model', ['item' => Model::find($id)]);
    }

}
