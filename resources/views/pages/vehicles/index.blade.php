@extends('layouts.client')

@section('page.title')
    {{ __('Vehicles')  }}
@endsection

@section('content')
    <main class="d-flex flex-grow-1 row mx-2">
        <script>
            "use strict"
            $(document).ready(function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                let forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                        form.addEventListener('submit', function (event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
            })
        </script>
        <x-gray-background class="col-3">
            <div class="flex-grow-1">
                <h4>{{__('Add Vehicle')}}</h4>
                <form action="{{route('vehicle.post')}}" class="needs-validation" method="POST" novalidate>
                    @csrf

                    <x-form-group>
                        <input type="text" class="form-control" id="registrationPlate" name="registration_plate"
                               required>
                        <label for="registration_plate">{{__('Registration Plate')}}</label>
                    </x-form-group>

                    <x-form-group>
                        <input type="text" class="form-control" id="vin" name="vin" required>
                        <x-form-label for="vin">{{__('VIN')}}</x-form-label>
                    </x-form-group>

                    <x-form-group>
                        <x-form-input required type="number" name="mileage" id="mileage"/>
                        <x-form-label for="mileage">{{__('Mileage')}}</x-form-label>
                    </x-form-group>

                    <x-form-group>
                        <x-form-input required type="text" name="color" id="color"/>
                        <x-form-label for="color">{{__('Color')}}</x-form-label>
                    </x-form-group>

                    <x-form-group>
                        <select required class="form-control" name="mark_id" id="mark">
                            @foreach(App\Models\Mark::all() as $mark)
                                <option value="{{$mark->id}}">{{$mark->name}}</option>
                            @endforeach
                        </select>
                        <label for="model">{{__('Mark')}}</label>
                    </x-form-group>

                    <x-form-group>
                        <select required class="form-control" name="model_id" id="model"></select>
                        <label for="model">{{__('Model')}}</label>

                        <script>
                            $(document).ready(() => {
                                $('#mark').change((el) => {
                                    const selectedMark = parseInt($(el.target).val());
                                    const $modelInput = $('#model');

                                    $.ajax({
                                        url: "{{route('api.models')}}",
                                        type: "GET",
                                        data: {
                                            markId: selectedMark,
                                        },
                                        success: resp => {
                                            $modelInput.empty();
                                            resp.forEach((model) => {
                                                $modelInput.append(`<option value=${model['id']}>${model['name']} ${model['year']} ${model['transmission']}</option>`);
                                            })
                                        },
                                        error: resp => {
                                            console.log(resp);
                                        }
                                    })

                                    $modelInput.prop("disabled", false);
                                }).trigger('change');
                            });
                        </script>
                    </x-form-group>
                    <button class="btn btn-primary m-2" value="{{Auth::guard('client')->id()}}" name="client_id"
                            type="submit">{{__('Save')}}</button>
                </form>
            </div>
        </x-gray-background>
        <x-gray-background class="col">
            <div class="flex-grow-1">
                <h4>{{__('Your Vehicles')}}</h4>
                <table class="table-striped table">
                    <thead>
                    <th style="width: 5%">{{__('Действие')}}</th>
                    <th>{{__('Registration Plate')}}</th>
                    <th>{{__('VIN')}}</th>
                    <th>{{__('Mark')}}</th>
                    <th>{{__('Model')}}</th>
                    <th>{{__('Mileage')}} {{__("в км.")}}</th>
                    </thead>
                    <tbody>
                    @foreach($vehicles as $vehicle)
                        <tr>
                            <td>
                                @if($vehicle->statement)
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" style="width: 100%"
                                                aria-expanded="false"></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" style="width: 100%"
                                                aria-expanded="false"></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item"
                                                   href="{{route('vehicles.delete', ['id' => $vehicle->id])}}">{{__('Удалить')}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </td>
                            <td style="width: 9%">{{$vehicle->registration_plate}}</td>
                            <td>{{$vehicle->vin}}</td>
                            <td>{{$vehicle->model->mark->name}} {{$vehicle->model->name}}</td>
                            <td>{{$vehicle->model->name}} {{$vehicle->model->year}}</td>
                            <td>{{$vehicle->mileage}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </x-gray-background>
    </main>

    <script>
        $(document).ready(() => {
            $("#registrationPlate").inputmask({regex: '^(([АВЕКМНОРСТУХ] [0-9]{3} [АВЕКМНОРСТУХ]{2} [0-9]{1,3})'});
            // $("#vin").inputmask({regex: '^(?=.*[0-9])(?=.*[A-z])[0-9A-z-]{17}$'});
            // $("#vin").inputmask({regex: '^[A-HJ-NPR-Za-hj-npr-z\d]{8}[\dX][A-HJ-NPR-Za-hj-npr-z\d]{2}\d{6}$'});
            $("#vin").inputmask({regex: '[(A-H|J-N|P|R-Z|0-9)]{17}'});
        });
    </script>

    <x-error :errors="$errors"/>
@endsection
