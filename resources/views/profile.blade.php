<x-layout>


    @php
        $user = Auth::guard('client')->user();
    @endphp

    <form action="{{ route('client.put', ['uuid'=> $user->uuid]) }}" method="post">
        @csrf

        <div>
            <input name="last_name" id="last_name" type="text" value="{{$user->last_name}}">
            <label for="last_name">{{__('Last Name')}}</label>
        </div>
        <div>
            <input name="first_name" id="first_name" type="text" value="{{$user->first_name}}">
            <label for="first_name">{{__('First Name')}}</label>
        </div>
        <div>
            <input name="second_name" id="second_name" type="text" value="{{$user->second_name}}">
            <label for="second_name">{{__('Second Name')}}</label>
        </div>

        <button type="submit">{{__('Save')}}</button>
    </form>
</x-layout>
