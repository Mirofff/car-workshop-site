@extends('layouts.client')

@section('page.title')
    {{ __('Requests')  }}
@endsection

@section('content')
    <main class="d-flex flex-grow-1 row container-fluid">
        <x-gray-background class="col-3">
            <div class="flex-grow-1">
                <h4>{{__('Create new Request')}}</h4>
                <form action="{{route('request.post')}}" method="POST">
                    @csrf

                    <x-form-group>
                        <select class="form-control" name="vehicle_uuid" id="vehicle">
                            @foreach($vehicles as $vehicle)
                                <option value="{{$vehicle->uuid}}">{{$vehicle->model->mark->name}} {{$vehicle->model->name}} {{$vehicle->registration_plate}}</option>
                            @endforeach
                        </select>
                        <label for="vehicle">{{__('Vehicle')}}</label>
                    </x-form-group>

                    @php
                        $today_datetime = \Carbon\Carbon::now()->format('Y-m-d');
                    @endphp
                    <x-form-group>
                        <input required class="form-control" type="date" value="{{$today_datetime}}"
                               min="{{$today_datetime}}"
                               name="datetime" id="datetime">
                        <label for="datetime">{{__('Datetime')}}</label>
                    </x-form-group>

                    <label class="form-label" for="comment">{{__("Comment")}}</label>
                    <textarea rows="10" name="comment" class="form-control" id="comment"></textarea>
                    <button type="submit" value="{{Auth::guard('client')->id()}}" name="client_uuid"
                            class="btn btn-primary m-2">{{__('Save')}}</button>
                </form>
            </div>
        </x-gray-background>
        <x-gray-background class="col">
            <div class="flex-grow-1">
                <h4>{{__('Your Requests')}}</h4>
                <table class="table-striped table">
                    <thead>
                    <th>{{__('Datetime')}}</th>
                    <th>{{__('Vehicle')}}</th>
                    <th>{{__('Comment')}}</th>
                    </thead>
                    <tbody>
                    @foreach($requests as $request)
                        <tr>
                            <td>{{$request->datetime}}</td>
                            <td>{{$request->vehicle->model->mark->name}} {{$request->vehicle->model->name}} {{$request->vehicle->registration_plate}}</td>
                            <td>{{$request->comment}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </x-gray-background>
    </main>

    <x-error :errors="$errors"/>
@endsection