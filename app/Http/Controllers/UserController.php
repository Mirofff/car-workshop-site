<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditCarRequest;
use App\Http\Requests\UserBooking;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Engine;
use App\Models\Mark;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __invoke()
    {
        return view('dashboard', ['title' => 'Dashboard', 'user' => Auth::user()]);
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

}
