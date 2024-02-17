<x-header/>
<x-error :errors="$errors"/>
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
            {{$request->statement->status}}
            <tr>
                <th scope="row">{{$loop->index}}</th>
                <th scope="row">
                    @if($request->statement->status == \App\Enums\StatementStatus::NotComplete)

                        <form action="{{route('statement.post', ['request_uuid' => $request->uuid])}}" method="post">
                            @csrf

                            <input type="hidden" name="vehicle_uuid" value="{{$request->vehicle_uuid}}">
                            <input type="hidden" name="user_uuid" value="{{$request->user_uuid}}">
                            <button class="btn btn-link" type="submit">{{__('Create Statement')}}</button>
                        </form>

                    @else
                        <a href="{{route('admin.statements', ['uuid' => $request->uuid])}}">{{__('View Statement')}}</a>
                    @endif
                </th>
                <td>{{$request->uuid}}</td>
                <td>{{$request->datetime}}</td>
                <td>{{$request->comment}}</td>
                <td>{{$request->created_at}}</td>
                <td>{{$request->updated_at}}</td>
                <td>{{$request->user_uuid}}</td>
                <td>{{$request->vehicle_uuid}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>