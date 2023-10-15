<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function OrderDocx($request) {
        $uorder = DB::select('select o.id "id" o.date "date" from orders o where id = {$request->validated()}', [1]);
    }
}
