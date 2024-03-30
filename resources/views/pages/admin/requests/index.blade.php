@php
    use App\Enums\StatementStatus;
@endphp

@extends('layouts.admin')

@section('page.title')
    {{ __('Requests')  }}
@endsection

@section('content')
    <x-gray-background class="d-flex flex-column flex-grow-1 ">
        <script>
            $(document).ready(function () {
                $("#searchInput").on("keyup", function () {
                    let value = $(this).val().toLowerCase();
                    $("#requestsTable .searchTr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
        <div class="mb-3">
            <label for="searchInput" class="form-label"><h5>{{__("Search by Any")}}</h5></label>
            <input type="text" class="form-control" id="searchInput" aria-describedby="emailHelp">
        </div>
        <table id="requestsTable" class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('Option')}}</th>
                <th>{{__('Datetime')}}</th>
                <th>{{__('Client')}}</th>
                <th>{{__('Comment')}}</th>
                <th>{{__('Vehicle')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($requests as $request)
                @php
                    if ($request->statement === null ) {
                        $option =  route('statement.post', ['request_uuid'=>$request->uuid]);
                        $method = "POST";
                        $value = $request->uuid;
                        $a_title = __('Create New');
                    } else if ($request->statement?->status === StatementStatus::NotComplete->value) {
                        $option = route('statement.get', ['uuid'=>$request->statement?->uuid]);
                        $method = "GET";
                        $value = $request->statement->uuid;
                        $a_title = __('Show');
                    } else {
                        $option = route('statement.print', ['uuid'=>$request->statement?->uuid]);
                        $method = "GET";
                        $value = $request->statement->uuid;
                        $a_title = __('Print');
                    }
                @endphp
                <tr class="searchTr">
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <form target="_blank" action="{{$option}}" method="{{$method}}">
                            @csrf
                            <button class="btn {{$request->statement?->status === StatementStatus::Complete ? 'btn-primary': 'btn-secondary'}}"
                                    type="submit">{{$a_title}}</button>
                            <input type="hidden" name="request_uuid" value="{{$value}}">
                            <input type="hidden" name="statement_uuid" value="{{$request->statement?->uuid}}">
                            <input type="hidden" value="{{$request->vehicle_uuid}}" name="vehicle_uuid">
                            <input type="hidden" value="{{$request->client_uuid}}" name="client_uuid">
                        </form>
                    </td>
                    <td>{{$request->datetime}}</td>
                    <td>{{$request->client->last_name}} {{$request->client->first_name}} {{$request->client->second_name}}</td>
                    <td>{{$request->comment}}</td>
                    <td>{{$request->vehicle->registration_plate}} {{$request->vehicle->model->mark->name}} {{$request->vehicle->model->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-gray-background>

    <x-error :errors="$errors"/>
@endsection