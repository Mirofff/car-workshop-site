<x-layout>

    <div class="row">
        <div class="col-md-9">
            <div class="p-4">
                <div class="container">
                    <div class="container">
                        <h1>{{__('Your Vehicles')}}</h1>
                        <table class="table-striped table">
                            <thea>
                                <th>{{__('Datetime')}}</th>
                                <th>{{__('Vehicle')}}</th>
                                <th>{{__('Comment')}}</th>
                            </thea>
                            <tbody>
                            @foreach($requests as $request)
                                <tr>
                                    <td>{{$request->datetime}}</td>
                                    <td>{{$request->vehicle->model->mark->name}} {{$request->vehicle->model->name}} {{$request->vehicle->registration_plate}}</td>
                                    <td>{{$request->comment}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer/>

    <x-error :errors="$errors"/>
</x-layout>
