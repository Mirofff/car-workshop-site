@extends('layouts.client')

@section('page.title')
    {{ __('Vehicles')  }}
@endsection

@section('content')
    <main class="d-flex flex-grow-1 row container-fluid">
        <x-gray-background class="col-3">
            <div class="flex-grow-1">
                <h4>{{__('Add Vehicle')}}</h4>
                <form action="{{route('vehicle.post')}}" method="POST">
                    @csrf

                    <x-form-group>
                        <input class="form-control" required type="text" name="registration_plate"
                               id="registration_plate"/>
                        <label for="registration_plate">{{__('Registration Plate')}}</label>
                    </x-form-group>

                    <x-form-group>
                        <x-form-input required type="text" name="vin" id="vin"/>
                        <x-form-label for="vin">{{__('VIN')}}</x-form-label>
                    </x-form-group>

                    <x-form-group>
                        <x-form-input required type="text" name="engine" id="engine"/>
                        <x-form-label for="engine">{{__('engine')}}</x-form-label>
                    </x-form-group>

                    <x-form-group>
                        <x-form-input required type="text" name="tech_passport" id="tech_passport"/>
                        <x-form-label for="tech_passport">{{__('Tech passport')}}</x-form-label>
                    </x-form-group>

                    <x-form-group>
                        <x-form-input required type="number" name="mileage" id="mileage"/>
                        <x-form-label for="mileage">{{__('Mileage')}}</x-form-label>
                    </x-form-group>

                    <x-form-group>
                        <x-form-input required type="text" name="color" id="color"/>
                        <x-form-label for="color">{{__('Color')}}</x-form-label>
                    </x-form-group>

                    <x-form-group>
                        <select required class="form-control" name="model_id" id="model">
                            @foreach(App\Models\Model::all() as $model)
                                <option value="{{$model->id}}">{{$model->mark->name}} {{$model->name}}</option>
                            @endforeach
                        </select>
                        <label for="model">{{__('Model')}}</label>
                    </x-form-group>

                    <button class="btn btn-primary m-2" value="{{Auth::guard('client')->id()}}" name="client_uuid"
                            type="submit">{{__('Save')}}</button>
                </form>
            </div>
        </x-gray-background>
        <x-gray-background class="col">
            <div class="flex-grow-1">
                <h4>{{__('Your Vehicles')}}</h4>
                <table class="table-striped table">
                    <thead>
                    <th>{{__('Registration Plate')}}</th>
                    <th>{{__('VIN')}}</th>
                    <th>{{__('Mark Model')}}</th>
                    <th>{{__('Engine')}}</th>
                    <th>{{__('Mileage')}}</th>
                    </thead>
                    <tbody>
                    @foreach($vehicles as $vehicle)
                        <tr>
                            <td>{{$vehicle->registration_plate}}</td>
                            <td>{{$vehicle->vin}}</td>
                            <td>{{$vehicle->model->mark->name}} {{$vehicle->model->name}}</td>
                            <td>{{$vehicle->engine}}</td>
                            <td>{{$vehicle->mileage}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </x-gray-background>
    </main>

    <x-error :errors="$errors"/>
@endsection
