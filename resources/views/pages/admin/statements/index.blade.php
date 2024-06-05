{{-- TODO: Добавить возможность отменить заявку с указанием причины (через модалку) --}}
@php
    use App\Enums\StatementStatus;use App\Models\Consumable;use App\Models\Service;
@endphp

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
                    <textarea class="form-control" name="" id="statementInfo"
                              disabled>{{$statement->comment}}</textarea>
                    <label for="statementDatetime" class="form-label">{{__('Время записи')}}</label>
                    <input value="{{$statement->pickup_time}}" type="text" class="form-control"
                           id="statementDatetime" disabled>
                    <label for="statementVehicleInfo" class="form-label">{{__('Vehicle Info')}}</label>
                    <input
                        value="{{$vehicle->model->mark->name}} {{$vehicle->model->name}} {{$vehicle->registration_plate}}"
                        type="text" class="form-control"
                        id="statementVehicleInfo" disabled>
                    <label for="statementClientInfo" class="form-label">{{__('Client Info')}}</label>
                    <input value="{{$client->last_name}} {{$client->first_name}} {{$client->second_name}}" type="text"
                           class="form-control"
                           id="statementClientInfo" disabled>
                </div>

                @if($statement->status != StatementStatus::Complete->value)
                    <form class="d-flex flex-column flex-grow-1 col"
                          action="{{route('statement.save', ['id' => $statement->id])}}"
                          method="post">
                        @csrf

                        <label for="statementRegistrationDate"
                               class="form-label">{{__('Registration Date')}}</label>
                        <input name="registration_date"
                               value="{{$statement->registration_date ?? Carbon\Carbon::now()->toDateString()}}"
                               type="date"
                               class="form-control"
                               id="statementRegistrationDate" {{is_null($statement->registration_date) ? '' : 'disabled'}}>
                        <label for="statementExecutionDate" class="form-label">{{__('Execution Date')}}</label>
                        <input name="execution_date"
                               value="{{$statement->execution_date ?? Carbon\Carbon::now()->toDateString()}}"
                               type="date"
                               class="form-control"
                               id="statementExecutionDate" {{is_null($statement->execution_date) ? '' : 'disabled'}}>
                        <button type="submit" value="{{Auth::guard('client')->id()}}" name="client_id"
                                class="btn flex-grow-1 btn-outline-success m-1">{{__('Save')}}</button>
                    </form>
                @endif
                <form class="d-flex col" action="{{route('statement.print', ['id' => $statement->id])}}"
                      method="get">
                    @csrf
                    <button type="submit" value="{{Auth::guard('client')->id()}}" name="client_id"
                            class="btn flex-grow-1 btn-outline-primary m-1">{{__('Print')}}</button>
                </form>
            </div>
            <div class="border border-1 m-1 p-2">
                <label class="form-label" for="usedConsumable">{{__('Used Consumables')}}</label>
                <ul class="container-fluid flex-grow-1 list-group" id="usedConsumable">
                    @foreach($uconsumables as $uconsumable)
                        <li class="row list-group">
                            <form class="border border-1 m-1 p-2"
                                  action="{{ route('uconsumable.delete', $uconsumable->id) }}"
                                  method="POST">
                                <div
                                    class="flex-grow-1 d-flex justify-content-between align-items-center">
                                    {{ $uconsumable->consumable->name }}: {{ $uconsumable->quantity }}
                                    @csrf
                                    @method('DELETE')
                                    @if($statement->status != StatementStatus::Complete->value)
                                        <button class="btn btn-outline-danger btn-sm"
                                                type="submit">{{__('Del')}}</button>
                                    @endif
                                </div>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="border border-1 m-1 p-2">
                <label class="form-label" for="usedConsumable">{{__('Used Consumables')}}</label>
                <ul class="container-fluid flex-grow-1 list-group" id="usedConsumable">
                    @foreach($uservices as $uservice)
                        <li class="row list-group">
                            <form class="border border-1 m-1 p-2" action="{{ route('uservice.delete', $uservice->id) }}"
                                  method="POST">
                                <div
                                    class="flex-grow-1 d-flex justify-content-between align-items-center">
                                    {{ $uservice->service->name }}: {{ $uservice->quantity }}
                                    @csrf
                                    @method('DELETE')
                                    @if($statement->status != StatementStatus::Complete->value)
                                        <button class="btn btn-outline-danger btn-sm"
                                                type="submit">{{__('Del')}}</button>
                                    @endif
                                </div>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>

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
                <tr class="text-center">
                    <th scope="col">{{__('Add')}}</th>
                    <th scope="col">{{__('Tittle')}}</th>
                    <th scope="col">{{__('Price')}} {{__('(В рублях)')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach(Consumable::all() as $consumable)
                    <tr class="searchTr">
                        <td class="text-center">
                            <a href="{{route('uconsumable.put', ['id' => $consumable->id, 'statement_id' => $statement->id])}}">+</a>
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
                <tr class="text-center">
                    <th scope="col">{{__('Add')}}</th>
                    <th scope="col">{{__('Tittle')}}</th>
                    <th scope="col">{{__('Price')}} {{__('(В рублях)')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach(Service::all() as $service)
                    <tr class="searchTr">
                        <td class="text-center">
                            <a href="{{route('uservice.put', ['id' => $service->id, 'statement_id' => $statement->id])}}">+</a>
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
