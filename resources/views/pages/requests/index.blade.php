@php
        @endphp
@extends('layouts.client')

@section('page.title')
    {{ __('Requests')  }}
@endsection

@section('content')
    <div class="d-flex flex-grow-1 row mx-2">
        <x-gray-background class="col-3">
            <div class="flex-grow-1">
                <h4 class="m-4">{{__('Create new Request')}}</h4>
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

                    <x-form-group>
                        <input required class="form-control" type="date" name="pickup_date" id="pickup_date">
                        <label for="pickup_date">{{__('Дата')}}</label>
                    </x-form-group>

                    <x-form-group>
                        <select class="form-select" name="pickup_time" id="pickup_time"
                                aria-label=".form-select-lg example"></select>
                        <label for="pickup_time">{{__('Дата')}}</label>
                    </x-form-group>

                    <script>
                        $(document).ready(function () {
                            const $pickupTime = $('#pickup_time');
                            const $pickupDate = $('#pickup_date');

                            $pickupDate.attr({
                                value: luxon.DateTime.now().toISODate(),
                                min: luxon.DateTime.now().toISODate(),
                                max: luxon.DateTime.now().plus({day: 14}).toISODate()
                            });

                            for (let i = 11; i <= 19; i++) {
                                const date = luxon.DateTime.now().set({
                                    hour: i,
                                    minute: 0,
                                    second: 0,
                                    millisecond: 0
                                });
                                $pickupTime.append($('<option>', {
                                    value: `${date.hour}:00:00`,
                                    text: `${date.hour}:00`,
                                }));
                            }

                            $pickupDate.change(function () {
                                    $.ajax({
                                        url: "{{route('api.requests.pickup')}}",
                                        data: {
                                            pickupDate: this.value,
                                        },
                                        success: resp => {
                                            $("#pickup_time option").each(function (index) {
                                                resp.forEach(elem => {
                                                    if (this.value === elem.pickup_time) {
                                                        $(this).hide();
                                                    }
                                                });
                                            })

                                        },
                                        error: resp => {
                                            console.log(resp);
                                        }
                                    })
                                }
                            )

                            $pickupDate.trigger("change");
                        })
                    </script>

                    <label class="form-label" for="comment">{{__("Comment")}}</label>
                    <textarea rows="10" name="comment" class="form-control" id="comment"></textarea>
                    <center>
                        <button type="button" id="pickupInfoButton" class="btn btn-outline-success w-75 m-4"
                                data-bs-toggle="modal" data-bs-target="#pickupInfoModal">{{__('Подтвердить')}}</button>
                    </center>

                    <div class="modal fade" id="pickupInfoModal" tabindex="-1" aria-labelledby="pickupInfoModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <script>
                                $('#pickupInfoButton').click(function () {
                                    $('#chosenVehicleParagraph strong').text(`${$('#vehicle option:selected').text()}`);
                                    $('#pickupDatetimeParagraph strong').text(`${$('#pickup_date').val()} ${$('#pickup_time option:selected').text()}`);
                                    $('#commentParagraph').append($('#comment').val());
                                })
                            </script>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5"
                                        id="pickupInfoModalLabel">{{__('Информация о заявке')}}</h1>
                                </div>
                                <div class="modal-body" style="font-size: 18px">
                                    <p class="text-lg-center"
                                       id="chosenVehicleParagraph">{{__('Транспорт выбранный для ремонта: ')}}
                                        <br><strong></strong></p>
                                    <p class="text-lg-start"
                                       id="pickupDatetimeParagraph">{{__('Дата и время ремонта: ')}}
                                        <br><strong></strong></p>
                                    <p class="text-lg-start" id="commentParagraph">{{__('Причина заявки:')}}<br></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" value="{{Auth::guard('client')->id()}}" name="client_id"
                                            class="btn btn-primary m-2 w-100">{{__('Save')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </x-gray-background>
        <x-gray-background class="col">
            <div class="flex-grow-1">
                <h4 class="m-4">{{__('Your Requests')}}</h4>
                <table class="table">
                    <thead>
                    <th style="width: 5%">{{__("Discard")}}</th>
                    <th style="width: 15%">{{__('Datetime')}}</th>
                    <th style="width: 20%">{{__('Vehicle')}}</th>
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
                                        <button class="btn btn-sm btn-outline-danger w-100" type="submit">X</button>
                                    </form>
                                @endif
                            </td>
                            <td>{{$request->pickup_date}} {{$request->pickup_time}}</td>
                            <td>{{$request->vehicle->model->mark->name}} {{$request->vehicle->model->name}} {{$request->vehicle->registration_plate}}</td>
                            <td>{{$request->comment}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </x-gray-background>
    </div>

    <x-error :errors="$errors"/>

@endsection
