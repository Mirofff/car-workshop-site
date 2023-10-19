<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditCarAction;
use App\Http\Requests\EditCarRequest;
use App\Models\Car;
use App\Models\Engine;
use App\Models\Mark;
use App\Models\Model;

class CarController extends Controller
{
    public function edit_car_index(EditCarRequest $request)
    {
        $row = Car::findOrFail($request->validated()['id']);
        $engines = Engine::select('*')->get();
        $models = Model::select('*')->get();
        $marks = Mark::select('*')->get();

        return view('tables.forms.car.edit', ['title' => 'Car editing', 'car' => $row, 'engines' => $engines, 'marks' => $marks, 'models' => $models]);
    }

    public function edit_car_action(EditCarAction $request)
    {
        Car::find($request->validated()['id'])->update($request->validated());

        redirect()->route('edit-car');
    }
}
