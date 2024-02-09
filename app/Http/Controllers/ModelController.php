<?php

namespace App\Http\Controllers;

use App\Models\Model;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function get(Request $request, string $id)
    {
        return view('panel.page.model', ['item' => Model::find($id)]);
    }

}
