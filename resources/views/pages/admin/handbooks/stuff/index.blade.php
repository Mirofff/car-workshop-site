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
                <th>{{__('Логин')}}</th>
                <th>{{__('Пароль')}}</th>
                <th>{{__('Активно')}}</th>
                <th>{{__('Роль')}}</th>
                <th>{{__('Имя')}}</th>
                <th>{{__('Отчество')}}</th>
                <th>{{__('Фамилия')}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <form autocomplete="off"
                      action="{{route('admin.stuff.post')}}"
                      method="post">
                    @csrf
                    <td></td>
                    <td>
                        <button class="btn btn-outline-success w-100" type="submit">{{__('A')}}</button>
                    </td>
                    <td>
                    </td>
                    <td>
                        <x-form-input id="email" name="email" type="email" autocomplete="off"/>
                    </td>
                    <td>
                        <x-form-input id="password" name="password" type="password" autocomplete="off"/>
                    </td>
                    <td>
                        <input class="form-check-input" id="active" checked name="is_active" type="checkbox"/>
                    </td>
                    <td>
                        <x-form-select name="role">
                            <x-form-option
                                value="{{\App\Enums\UserRole::Admin->value}}">{{__('Админ')}}</x-form-option>
                            <x-form-option
                                value="{{\App\Enums\UserRole::Operator->value}}">{{__('Оператор')}}</x-form-option>
                        </x-form-select>
                    </td>
                    <td>
                        <x-form-input id="firstName" name="first_name"/>
                    </td>
                    <td>
                        <x-form-input id="firstName" name="second_name"/>
                    </td>
                    <td>
                        <x-form-input id="firstName" name="last_name"/>
                    </td>
                </form>
            </tr>
            @foreach($stuff as $employee)
                <tr class="searchTr">
                    <form autocomplete="off"
                          action="{{route('admin.stuff.put', ['id' => $employee->id])}}"
                          method="post">
                        @csrf
                        <td class="text-center"><input class="form-control" name="id" type="hidden"
                                                       value="{{$employee->id}}">{{$employee->id}}</td>
                        <td>
                            <button class="btn btn-outline-warning w-100" name="_method" value="PUT"
                                    type="submit">{{__('O')}}</button>
                        </td>
                        <td>
                            <button class="btn btn-outline-danger w-100" name="_method" value="DELETE"
                                    type="submit">{{__('X')}}</button>
                        </td>
                        <td>
                            <x-form-input id="email" name="email" type="email"
                                          value="{{$employee->email}}"/>
                        </td>
                        <td>
                            <x-form-input id="password" name="password" type="password"/>
                        </td>
                        <td>
                            <input class="form-check-input" id="active" name="is_active"
                                   value="{{$employee->is_active}}"
                                   type="checkbox" {{boolval($employee->is_active) ? "checked" : ""}} />
                        </td>
                        <td>
                            <x-form-select>
                                <option
                                    value="{{\App\Enums\UserRole::Admin->value}}" {{$employee->role == \App\Enums\UserRole::Admin->value ? 'selected' : ''}}>
                                    Админ
                                </option>
                                <option
                                    value="{{\App\Enums\UserRole::Operator->value}}" {{$employee->role == \App\Enums\UserRole::Operator->value ? 'selected' : ''}}>
                                    Оператор
                                </option>

                            </x-form-select>
                        </td>
                        <td>
                            <x-form-input id="firstName" name="first_name" value="{{$employee->first_name}}"/>
                        </td>
                        <td>
                            <x-form-input id="firstName" name="second_name" value="{{$employee->second_name}}"/>
                        </td>
                        <td>
                            <x-form-input id="firstName" name="last_name" value="{{$employee->last_name}}"/>
                        </td>
                    </form>
                </tr>
            @endforeach


            </tbody>
        </table>

    </x-gray-background>

    <x-error :errors="$errors"/>
@endsection
