<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditCarRequest;
use App\Http\Requests\UserAddCar;
use App\Http\Requests\UserBooking;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Engine;
use App\Models\Mark;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __invoke()
    {
        return view('dashboard', ['title' => 'Dashboard', 'user' => Auth::user()]);
    }

    public function add_car(UserAddCar $request)
    {
        Car::create($request->validated());
        $cars = DB::table('cars')
            ->where('cars.user_id', Auth::user()->id)
            ->get();

        redirect()->route('cars');
        // $engines = DB::table('engines')->get();
        // $models = DB::table('models')->get();
        // return view('cars', ['title' => 'Cars', 'user' => Auth::user(), 'cars' => $cars, 'engines' => $engines, 'models' => $models]);
    }

    public function index_booking(Request $request)
    {
        date_default_timezone_set('Europe/Kaliningrad');
        $rows = Schedule::where('user_id', '=', Auth::user()->id)->get();
        return view('booking', ['title' => 'Booking', 'user' => Auth::user(), 'rows' => $rows]);
    }

    public function booking_action(UserBooking $request)
    {
        $date = $request->validated()['date'];
        $hour = $request->validated()['hour'];
        if (
            !Schedule::where('date', '=', $date)
                ->where('hour', '=', $hour)
                ->first()
        ) {
            Schedule::create($request->validated());

            return redirect()->route('booking');
        }
        return redirect()
            ->back()
            ->withErrors(['error' => 'The selected day and time is already taken']);
    }

    public function index_cars()
    {
        $cars = DB::table('cars')
            ->where('cars.user_id', Auth::user()->id)
            ->get();
        $engines = DB::table('engines')->get();
        $models = DB::table('models')->get();
        $marks = DB::table('marks')->get();
        return view('cars', ['title' => 'Cars', 'user' => Auth::user(), 'cars' => $cars, 'engines' => $engines, 'marks' => $marks, 'models' => $models]);
    }
    public function cars_action()
    {
        return 0;
    }
}
