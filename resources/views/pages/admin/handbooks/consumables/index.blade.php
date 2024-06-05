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
                      action="{{route('admin.consumables.post')}}"
                      method="post">
                    @csrf
                    <td></td>
                    <td>
                        <button class="btn btn-outline-success w-100" type="submit">{{__('A')}}</button>
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
            @foreach($consumables as $consumable)
                <tr class="searchTr">
                    <form autocomplete="off"
                          action="{{route('admin.consumable.put', ['id' => $consumable->id])}}"
                          method="post">
                        @csrf
                        <td class="text-center"><input class="form-control" name="id" type="hidden"
                                   value="{{$consumable->id}}">{{$consumable->id}}</td>
                        <td>
                            <button class="btn btn-outline-warning w-100" name="_method" value="PUT"
                                    type="submit">{{__('O')}}</button>
                        </td>
                        <td>
                            <button class="btn btn-outline-danger w-100" name="_method" value="DELETE"
                                    type="submit">{{__('X')}}</button>
                        </td>
                        <td>
                            <x-form-input id="name" name="name" type="text"
                                          value="{{$consumable->name}}"/>
                        </td>
                        <td>
                            <x-form-input id="price" name="price" type="number" min="1" step="any"
                                          value="{{$consumable->price}}"/>
                        </td>
                    </form>
                </tr>
            @endforeach

            </tbody>
        </table>

    </x-gray-background>

    <x-error :errors="$errors"/>
@endsection
