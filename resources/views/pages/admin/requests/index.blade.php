@php
    use App\Enums\StatementStatus;
@endphp

@extends('layouts.admin')

@section('page.title')
    {{ __('Requests')  }}
@endsection

@section('content')
    <x-gray-background class="d-flex flex-column flex-grow-1">
        <script>
            $(document).ready(function () {
                const $requestsTableSearchTr = $("#requestsTable .searchTr");
                $("#searchInput").on("keyup", function () {
                    let value = $(this).val().toLowerCase();
                    $requestsTableSearchTr.filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });

                $('input[name=filterRadio]').change(function () {
                    switch ($(this, ':checked').attr('id')) {
                        case 'allCheckbox':
                            $requestsTableSearchTr.filter(function () {
                                $(this).show();
                            })
                            break;
                        case 'onlyProcessedCheckbox':
                            $requestsTableSearchTr.filter(function () {
                                if ($(this).find('td form button').text() === "{{__('Print')}}") {
                                    $(this).show();
                                } else {
                                    $(this).hide();
                                }
                            })
                            break;
                        case 'onlyNewCheckbox':
                            $requestsTableSearchTr.filter(function () {
                                if ($(this).find('td form button').text() === "{{__('Show')}}") {
                                    $(this).show();
                                } else {
                                    $(this).hide();
                                }
                            });
                            break;
                    }
                });
            });
        </script>
        <div class="container-fluid m-2 p-2 border border-2">
            <div class="row">
                <div class="col-2 p-2 mx-3 d-flex flex-column justify-content-around border border-2 rounded rounded-2">
                    <div class="form-check" id="filterRadio">
                        <input type="radio" class="form-check-input" name="filterRadio" id="allCheckbox" checked>
                        <label for="allCheckbox" class="form-check-label"><h5>{{__("Все")}}</h5></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="filterRadio" id="onlyProcessedCheckbox">
                        <label for="onlyProcessedCheckbox" class="form-check-label">
                            <h5>{{__("Только обработанные")}}</h5></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="filterRadio" id="onlyNewCheckbox">
                        <label for="onlyNewCheckbox" class="form-check-label"><h5>{{__("Только заявки")}}</h5></label>
                    </div>
                </div>
                <div class="col d-flex flex-column justify-content-around">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-lg" id="searchInput"
                               aria-describedby="emailHelp">
                        <label for="searchInput" class="form-label"><h5>{{__("Search by Any")}}</h5></label>
                    </div>
                </div>
            </div>
        </div>
        <table id="requestsTable" class="table table-striped">
            <thead>
            <tr class="text-lg-center">
                <th>#</th>
                <th style="width: 7%">{{__('Option')}}</th>
                <th>{{__('Время записи/исполнения')}}</th>
                <th>{{__('Client')}}</th>
                <th>{{__('Comment')}}</th>
                <th>{{__('Vehicle')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($statements as $statement)
                @php
                    if ($statement->status === StatementStatus::NotComplete->value) {
                        $option = route('admin.statement.post', ['id'=>$statement?->id]);
                        $method = "GET";
                        $value = $statement->id;
                        $a_title = __('Show');
                    } else {
                        $option = route('statement.print', ['id'=>$statement?->id]);
                        $method = "GET";
                        $value = $statement->id;
                        $a_title = __('Print');
                    }
                @endphp
                <tr class="searchTr">
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>
                        <form target="_blank" action="{{$option}}" method="{{$method}}">
                            <button
                                class="btn w-100 btn-sm {{$statement?->status == StatementStatus::Complete->value ? 'btn-primary': 'btn-secondary'}}"
                                type="submit">{{$a_title}}</button>
                            <input type="hidden" name="statement_id" value="{{$statement->id}}">
                            <input type="hidden" value="{{$statement->vehicle_id}}" name="vehicle_id">
                            <input type="hidden" value="{{$statement->client_id}}" name="client_id">
                        </form>
                    </td>
                    <td class="text-center">{{$statement->status == StatementStatus::Complete->value ? $statement->execution_date : $statement->pickup_date . " " . $statement->pickup_time}}</td>
                    <td>{{$statement->client->last_name}} {{$statement->client->first_name}} {{$statement->client->second_name}}</td>
                    <td>{{$statement->comment}}</td>
                    <td>{{$statement->vehicle->registration_plate}} {{$statement->vehicle->model->mark->name}} {{$statement->vehicle->model->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-gray-background>

    <x-error :errors="$errors"/>
@endsection
