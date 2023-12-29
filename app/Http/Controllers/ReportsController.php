<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('reports', ['user' => Auth::user(), 'title' => 'Reports']);
    }

    public function repairs_index(Request $request)
    {
        $cars = DB::table('cars')
            ->join('models', 'cars.model_id', '=', 'models.id')
            ->join('marks', 'models.mark_id', '=', 'marks.id')
            ->select('marks.mark', DB::raw('COUNT(*) as quantity'))
            ->groupBy('marks.mark')
            ->get();
        return view('reports.repairs', ['user' => Auth::user(), 'title' => 'Revanue', 'cars' => $cars]);
    }

    public function revanue_index(Request $request)
    {
        $parts_full_sum = DB::table('used_parts as up')
            ->join('parts as p', 'p.id', '=', 'up.part_id')
            ->select(DB::raw('sum(p.price * up.quantity) as full_sum'))
            ->join('orders', 'orders.id', '=', 'up.order_id')
            ->whereBetween('orders.date', [$request->start_date, $request->end_date])
            ->get()[0]->full_sum;

        $services_full_sum = DB::table('used_services as us')
            ->join('services as s', 's.id', '=', 'us.service_id')
            ->select(DB::raw('sum(s.price * us.quantity) as full_sum'))
            ->join('orders', 'orders.id', '=', 'us.order_id')
            ->whereBetween('orders.date', [$request->start_date, $request->end_date])
            ->get()[0]->full_sum;

        $services = DB::table('used_services')
            ->join('services', 'services.id', '=', 'used_services.service_id')
            ->select('*')
            ->join('orders', 'orders.id', '=', 'used_services.order_id')
            ->whereBetween('orders.date', [$request->start_date, $request->end_date])
            ->get();

        $parts = DB::table('used_parts')
            ->join('parts', 'parts.id', '=', 'used_parts.part_id')
            ->select('*')
            ->join('orders', 'orders.id', '=', 'used_parts.order_id')
            ->whereBetween('orders.date', [$request->start_date, $request->end_date])
            ->get();

        return view('reports.revanue', ['user' => Auth::user(), 'title' => 'Repairs', 'parts' => $parts, 'services' => $services, 'parts_full_sum' => $parts_full_sum, 'services_full_sum' => $services_full_sum]);
    }
}
