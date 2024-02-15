@include('components.head')
<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        @isset($get_route)
            <th scope="col">{{__('Update')}}</th>
        @endisset
        @foreach ($columns as $value)
            <th scope="col">{{__($value)}}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach ($items as $item)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            @foreach ($item->toArray() as $column => $value)
                @isset($get_route)
                    @if($column == $id_column)
                        <td><a href="{{route($get_route, [$id_column => $value])}}">{{__('Update')}}</a></td>
                    @endif
                @endisset
                @if($value == 1 or $value == 0)
                    <td>{{ $value ? __('Yes') : __('No')}}</td>
                @else
                    <td>{{ $value }}</td>
                @endif
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
