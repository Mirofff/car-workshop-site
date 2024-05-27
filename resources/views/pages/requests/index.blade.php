@php
    use Carbon\Carbon;
@endphp
@extends('layouts.client')

@section('page.title')
    {{ __('Requests')  }}
@endsection

@section('content')
    <div class="d-flex flex-grow-1 row mx-2">
        <x-gray-background class="col-3">
            <div class="flex-grow-1">
                <h4>{{__('Create new Request')}}</h4>
                <form action="{{route('request.post')}}" method="POST">
                    @csrf

                    <x-form-group>
                        <select class="form-control" name="vehicle_id" id="vehicle">
                            @foreach($vehicles as $vehicle)
                                <option
                                    value="{{$vehicle->id}}">{{$vehicle->model->mark->name}} {{$vehicle->model->name}} {{$vehicle->registration_plate}}</option>
                            @endforeach
                        </select>
                        <label for="vehicle">{{__('Vehicle')}}</label>
                    </x-form-group>

                    @php
                        $today_datetime = \Carbon\Carbon::now()->toISOString();
                    @endphp
                    <script>
                        function toLocalISOString(date) {
                            const localDate = new Date(date - date.getTimezoneOffset() * 60000); //offset in milliseconds. Credit https://stackoverflow.com/questions/10830357/javascript-toisostring-ignores-timezone-offset

                            // Optionally remove second/millisecond if needed
                            localDate.setSeconds(null);
                            localDate.setMilliseconds(null);
                            return localDate.toISOString().slice(0, -1);
                        }

                        window.addEventListener("load", () => {
                            const element = document.getElementById("datetime");
                            // element.value = toLocalISOString(new Date());
                            element.min = toLocalISOString(new Date());
                        });
                    </script>
                    <x-form-group>
                        <input required class="form-control" type="datetime-local" step="3600"
                               name="pickup_time"
                               id="datetime">
                        <label for="datetime">{{__('Datetime')}}</label>
                    </x-form-group>

                    <label class="form-label" for="comment">{{__("Comment")}}</label>
                    <textarea rows="10" name="comment" class="form-control" id="comment"></textarea>
                    <button type="submit" value="{{Auth::guard('client')->id()}}" name="client_id"
                            class="btn btn-primary m-2">{{__('Save')}}</button>
                </form>
            </div>
        </x-gray-background>
        <x-gray-background class="col">
            <div class="flex-grow-1">
                <h4>{{__('Your Requests')}}</h4>
                <table class="table">
                    <thead>
                    <th>{{__("Discard")}}</th>
                    <th>{{__('Datetime')}}</th>
                    <th>{{__('Vehicle')}}</th>
                    <th>{{__('Comment')}}</th>
                    </thead>
                    <tbody>
                    @foreach($requests as $request)
                        @php
                            $requestComplete = $request->status == \App\Enums\StatementStatus::Complete->value;
                        @endphp
                        <tr {{$requestComplete ? 'class=table-success' : ""}}>
                            <td>
                                @if(!$requestComplete)
                                    <form action="{{route("statement.discard", ['statementId' => $request->id])}}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">X</button>
                                    </form>
                                @endif
                            </td>
                            <td>{{$request->pickup_time}}</td>
                            <td>{{$request->vehicle->model->mark->name}} {{$request->vehicle->model->name}} {{$request->vehicle->registration_plate}}</td>
                            <td>{{$request->comment}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </x-gray-background>
    </div>
    </div>

    <x-error :errors="$errors"/>

@endsection
