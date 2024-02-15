<x-header/>
<x-layout>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('Create Statement')}}</th>
            @foreach($columns as $column)
                <th scope="col">{{__($column)}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr>
                <th scope="row">{{$loop->index}}</th>
                <th scope="row">
                    <form action="{{route('statement.post', ['request_uuid' => $request->uuid])}}" method="post">
                        @csrf
                        <input type="hidden" name="vehicle_uuid" value="{{$request->vehicle_uuid}}">
                        <input type="hidden" name="client_uuid" value="{{$request->client_uuid}}">
                        <button class="btn btn-link" type="submit">{{__('Create Statement')}}</button>
                    </form>
                </th>
                @foreach ($request->toArray() as $column => $value)
                    <td>{{$value}}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>