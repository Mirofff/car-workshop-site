@extends('layouts.admin')

@section('page.title')
    {{ __('Requests')  }}
@endsection

@section('content')
    <x-gray-background class="d-flex flex-column flex-grow-1 ">
        <table id="requestsTable" class="table table-striped">
            <thead>
            <tr>
                <th style="width: 3%">#</th>
                <th style="width: 5%">{{__('Изменить')}}</th>
                <th style="width: 5%">{{__('Удалить')}}</th>
                <th>{{__('Название')}}</th>
                <th>{{__('Цена')}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <form autocomplete="off"
                      action="{{route('admin.services.post')}}"
                      method="post">
                    @csrf
                    <td></td>
                    <td>
                        <button class="btn btn-success" type="submit">{{__('A')}}</button>
                    </td>
                    <td>
                    </td>
                    <td>
                        <x-form-input id="name" name="name" type="text"/>
                    </td>
                    <td>
                        <x-form-input id="price" name="price" type="number" min="1" step="any"/>
                    </td>
                </form>
            </tr>
            @foreach($services as $service)
                <tr class="searchTr">
                    <form autocomplete="off"
                          action="{{route('admin.service.put', ['id' => $service->id])}}"
                          method="post">
                        @csrf
                        <td><input class="form-control" name="id" type="hidden"
                                   value="{{$service->id}}">{{$service->id}}</td>
                        <td>
                            <button class="btn btn-warning" name="_method" value="PUT"
                                    type="submit">{{__('O')}}</button>
                        </td>
                        <td>
                            <button class="btn btn-danger" name="_method" value="DELETE"
                                    type="submit">{{__('X')}}</button>
                        </td>
                        <td>
                            <x-form-input id="name" name="name" type="text"
                                          value="{{$service->name}}"/>
                        </td>
                        <td>
                            <x-form-input id="price" name="price" type="number" min="1" step="any"
                                          value="{{$service->price}}"/>
                        </td>
                    </form>
                </tr>
            @endforeach

            </tbody>
        </table>

    </x-gray-background>

    <x-error :errors="$errors"/>
@endsection
