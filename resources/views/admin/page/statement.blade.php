<x-layout>
    <x-header/>
    <main style="display: flex; flex-wrap: nowrap">
        <div class="d-flex flex-column flex-shrink-0 p-3 h-100" style="width: 400px;">
            <form action="{{route('statement.put', ['uuid' => $statement_uuid])}}" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal">{{__('Enter statement info')}}</h1>

                <label for="vehicle_uuid">{{__('Statement UUID')}}</label>
                <input disabled value="{{$statement_uuid}}" type="text" name="vehicle_uuid" class="form-control"
                       id="vehicle_uuid">

                <label for="vehicle_uuid">{{__('Vehicle UUID')}}</label>
                <input disabled value="{{$vehicle_uuid}}" type="text" name="vehicle_uuid" class="form-control"
                       id="vehicle_uuid">

                <label for="user_uuid">{{__('User UUID')}}</label>
                <input disabled value="{{$user_uuid}}" type="text" name="user_uuid" class="form-control" id="user_uuid">

                <button class="btn btn-primary w-100 py-2" type="submit">{{__('Save')}}</button>
            </form>
            <div>
                <h1 class="h3 mb-3 fw-normal">{{__('Used Consumables')}}</h1>
                <ul class="list-group">
                    @foreach($uconsumables as $uconsumable)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $uconsumable->consumable->name }}: {{ $uconsumable->quantity }}
                            <form action="{{ route('uconsumable.delete', $uconsumable->uuid) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">-</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h1 class="h3 mb-3 fw-normal">{{__('Used Services')}}</h1>
                <ul class="list-group">
                    @foreach($uservices as $uservice)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $uservice->service->name }}: {{ $uservice->quantity }}
                            <form action="{{ route('uservice.delete', $uservice->uuid) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">-</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        <table class="table table-striped h-50">
            <thead>
            <tr>
                <th scope="col">{{__('Add Service')}}</th>
                @foreach(Schema::getColumnListing('consumables') as $column)
                    <th scope="col">{{__($column)}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Models\Consumable::all() as $consumable)
                <tr>
                    <td>
                        <a href="{{route('uconsumable.put', ['uuid' => $consumable->uuid, 'statement_uuid' => $statement_uuid])}}">+</a>
                    </td>
                    <th scope="row">{{$consumable->uuid}}</th>
                    <td>{{$consumable->price}}</td>
                    <td>{{$consumable->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <table class="table table-striped h-50">
            <thead>
            <tr>
                <th scope="col">{{__('Add Consumable')}}</th>
                @foreach(Schema::getColumnListing('services') as $column)
                    <th scope="col">{{__($column)}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Models\Service::all() as $service)
                <tr>
                    <td>
                        <a href="{{route('uservice.put', ['uuid' => $service->uuid, 'statement_uuid' => $statement_uuid])}}">+</a>
                    </td>
                    <th scope="row">{{$service->uuid}}</th>
                    <td>{{$service->name}}</td>
                    <td>{{$service->price}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>


    <x-error/>
</x-layout>