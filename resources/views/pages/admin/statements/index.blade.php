@extends('layouts.admin')

@section('page.title')
    {{ __('Statement')  }}
@endsection

@section('content')
    <div class="row mx-2">
        <x-gray-background class="col-3">
            <div class="border m-1 p-2">
                <h1 class="h3 mb-3 fw-normal">{{__('Statement Info')}}</h1>

                <div class="mb-3">
                    <label for="statementInfo" class="form-label">{{__('Statement Info')}}</label>
                    <input value="{{$statement->request->comment}}" type="text" class="form-control" id="statementInfo"
                           disabled>
                    <label for="statementDatetime" class="form-label">{{__('Statement Info')}}</label>
                    <input value="{{__('from')}} {{$statement->request->datetime}}" type="text" class="form-control"
                           id="statementDatetime" disabled>
                    <label for="statementVehicleInfo" class="form-label">{{__('Vehicle Info')}}</label>
                    <input value="{{$vehicle->model->mark->name}} {{$vehicle->model->name}} {{$vehicle->registration_plate}}"
                           type="text" class="form-control"
                           id="statementVehicleInfo" disabled>
                    <label for="statementClientInfo" class="form-label">{{__('Client Info')}}</label>
                    <input value="{{$client->last_name}} {{$client->first_name}} {{$client->second_name}}" type="text"
                           class="form-control"
                           id="statementClientInfo" disabled>
                </div>
                <div class="row">
                    @if($statement->status != \App\Enums\StatementStatus::Complete->value)
                        <form class="d-flex col" action="{{route('statement.save', ['uuid' => $statement->uuid])}}"
                              method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" value="{{Auth::guard('client')->id()}}" name="client_uuid"
                                    class="btn flex-grow-1 btn-outline-success m-1">{{__('Save')}}</button>
                        </form>
                    @endif
                    <form class="d-flex col" action="{{route('statement.print', ['uuid' => $statement->uuid])}}"
                          method="get">
                        @csrf
                        <button type="submit" value="{{Auth::guard('client')->id()}}" name="client_uuid"
                                class="btn flex-grow-1 btn-outline-primary m-1">{{__('Print')}}</button>
                    </form>
                </div>
            </div>
            <x-gray-background class="d-flex flex-column">
                <label class="form-label" for="usedConsumable">{{__('Used Consumables')}}</label>
                <ul class="flex-grow-1 list-group overflow-scroll" id="usedConsumable">
                    @foreach($uconsumables as $uconsumable)
                        <form action="{{ route('uconsumable.delete', $uconsumable->uuid) }}" method="POST">
                            <x-gray-background
                                    class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $uconsumable->consumable->name }}: {{ $uconsumable->quantity }}
                                @csrf
                                @method('DELETE')
                                @if($statement->status != \App\Enums\StatementStatus::Complete->value)
                                    <button class="btn btn-outline-danger btn-sm"
                                            type="submit">{{__('Del')}}</button>
                                @endif
                            </x-gray-background>
                        </form>
                    @endforeach
                </ul>
            </x-gray-background>

            <x-gray-background class="d-flex flex-column">
                <label class="form-label" for="usedServices">{{__('Used Services')}}</label>
                <ul class="flex-grow-1 list-group overflow-scroll" id="usedServices">
                    @foreach($uservices as $uservice)
                        <form action="{{ route('uservice.delete', $uservice->uuid) }}" method="POST">
                            <x-gray-background
                                    class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $uservice->service->name }}: {{ $uservice->quantity }}
                                @csrf
                                @method('DELETE')
                                @if($statement->status != \App\Enums\StatementStatus::Complete->value)
                                    <button class="btn btn-outline-danger btn-sm"
                                            type="submit">{{__('Del')}}</button>
                                @endif
                            </x-gray-background>
                        </form>
                    @endforeach
                </ul>
            </x-gray-background>
        </x-gray-background>

        <x-gray-background class="col">
            <script>
                $(document).ready(function () {
                    $("#consumablesInput").on("keyup", function () {
                        let value = $(this).val().toLowerCase();
                        $("#consumablesTable tbody .searchTr").filter(function () {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>
            <div class="form-group m-2">
                <label class="form-label" for="consumablesInput">{{__("Search by Tittle")}}</label>
                <input class="form-control" id="consumablesInput">
            </div>
            <table id="consumablesTable" class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">{{__('Add')}}</th>
                    <th scope="col">{{__('Title')}}</th>
                    <th scope="col">{{__('Price')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Consumable::all() as $consumable)
                    <tr class="searchTr">
                        <td>
                            <a href="{{route('uconsumable.put', ['uuid' => $consumable->uuid, 'statement_uuid' => $statement->uuid])}}">+</a>
                        </td>
                        <td>{{$consumable->name}}</td>
                        <td>{{$consumable->price}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-gray-background>

        <x-gray-background class="col">
            <script>
                $(document).ready(function () {
                    $("#servicesInput").on("keyup", function () {
                        let value = $(this).val().toLowerCase();
                        $("#servicesTable tbody .searchTr").filter(function () {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>
            <div class="form-group m-2">
                <label class="form-label" for="servicesInput">{{__("Search by Tittle")}}</label>
                <input class="form-control" id="servicesInput">
            </div>
            <table id="servicesTable" class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">{{__('Add')}}</th>
                    <th scope="col">{{__('Title')}}</th>
                    <th scope="col">{{__('Price')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Service::all() as $service)
                    <tr class="searchTr">
                        <td>
                            <a href="{{route('uservice.put', ['uuid' => $service->uuid, 'statement_uuid' => $statement->uuid])}}">+</a>
                        </td>
                        <td>{{$service->name}}</td>
                        <td>{{$service->price}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </x-gray-background>
    </div>

    <x-error :errors="$errors"/>
@endsection
