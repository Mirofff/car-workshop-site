<table class="table table-bordered">
    <tr>
        @isset($get_route)
            <td>{{__('Update')}}</td>
        @endisset
        @foreach ($items[0]->toArray() as $column => $value)
            <td>{{ $column }}</td>
        @endforeach
    </tr>
    @foreach ($items as $item)
        <tr>
            @foreach ($item->toArray() as $column => $value)
                @isset($get_route)
                    @if($column == 'uuid' or $column == 'id')
                        <td><a href="{{route($get_route, ['uuid' => $value])}}">{{__('Update')}}</a></td>
                    @endif
                @endisset
                @if(is_bool($value))
                    <td>{{ $value ? __('Yes') : __('No')}}</td>
                @else
                    <td>{{ $value }}</td>
                @endif
            @endforeach
        </tr>
    @endforeach
</table>
