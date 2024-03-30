<x-layout>
    <div class="row">
        <div class="col-md-3">
            <div class="p-4">
                <h4>{{__('Add Service')}}</h4>
                <form action="{{route('service.put')}}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">{{__('Consumable Name')}}</label>
                        <input required type="text" value="{{$current_service?->name}}" class="form-control"
                               name="name" id="name">
                    </div>

                    <div class="form-group">
                        <label for="price">{{__('Consumable Price')}}</label>
                        <input required type="number" step="0.01" value="{{$current_service?->price}}"
                               class="form-control" name="price"
                               id="price">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" value="{{$current_service?->uuid}}" name="service_uuid"
                                type="submit">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            <div class="p-4">
                <h1>{{__('Services')}}</h1>
                <table class="table-striped table">
                    <thea>
                        <th>{{__('Update')}}</th>
                        <th>{{__('UUID')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Price')}}</th>
                    </thea>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>
                                <a href="{{route('admin.services', ['uuid' => $service->uuid])}}">{{__('Update')}}</a>
                            </td>
                            <td>{{$service->uuid}}</td>
                            <td>{{$service->name}}</td>
                            <td>{{$service->price}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-error :errors="$errors"/>
</x-layout>
