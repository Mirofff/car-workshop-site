<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarsTableController extends Controller
{
    public function __invoke()
    {
        $table = "cars";
        $rows = DB::table($table)->join('models', 'cars.model_id', '=', 'models.id')->join('marks', 'models.mark_id', '=', 'marks.id')->join('engines', 'cars.engine_id', '=', 'engines.id')->select('*', 'engines.name as engine')->get();
        return view('tables.' . $table, array_merge(['rows' => $rows, 'title' => $table]));
    }

}
