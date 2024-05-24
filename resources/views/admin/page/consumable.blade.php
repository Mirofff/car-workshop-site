<x-layout>
    <div class="row">
        <div class="col-md-3">
            <div class="p-4">
                <h4>{{__('Add Consumable')}}</h4>
                <form action="{{route('consumable.put')}}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">{{__('Consumable Name')}}</label>
                        <input required type="text" value="{{$current_consumable?->name}}" class="form-control"
                               name="name" id="name">
                    </div>

                    <div class="form-group">
                        <label for="price">{{__('Consumable Price')}}</label>
                        <input required type="number" step="0.01" value="{{$current_consumable?->price}}"
                               class="form-control" name="price"
                               id="price">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" value="{{$current_consumable?->id}}" name="consumable_id"
                                type="submit">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            <div class="p-4">
                <h1>{{__('Consumables')}}</h1>
                <table class="table-striped table">
                    <thea>
                        <th>{{__('Update')}}</th>
                        <th>{{__('ID')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Price')}}</th>
                    </thea>
                    <tbody>
                    @foreach($consumables as $consumable)
                        <tr>
                            <td>
                                <a href="{{route('admin.consumables', ['id' => $consumable->id])}}">{{__('Update')}}</a>
                            </td>
                            <td>{{$consumable->id}}</td>
                            <td>{{$consumable->name}}</td>
                            <td>{{$consumable->price}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-error :errors="$errors"/>
</x-layout>
