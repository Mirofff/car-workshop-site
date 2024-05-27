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
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <form target="_blank" action="{{$option}}" method="{{$method}}">
                            @csrf
                            <button
                                class="btn {{$statement?->status == StatementStatus::Complete->value ? 'btn-primary': 'btn-secondary'}}"
                                type="submit">{{$a_title}}</button>
                            <input type="hidden" name="statement_id" value="{{$statement->id}}">
                            <input type="hidden" value="{{$statement->vehicle_id}}" name="vehicle_id">
                            <input type="hidden" value="{{$statement->client_id}}" name="client_id">
                        </form>
                    </td>
                    <td>{{$statement->status == StatementStatus::Complete->value ? $statement->execution_date : $statement->pickup_time}}</td>
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
