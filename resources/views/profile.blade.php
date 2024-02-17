<form action="{{ route('user.put') }}" method="post">
    @csrf

    <input name="last_name" id="last_name" type="text" value="{{Auth::user()->last_name}}">
    <label for="last_name">{{__('Last Name')}}</label>
    <input name="first_name" id="first_name" type="text" value="{{Auth::user()->first_name}}">
    <label for="first_name">{{__('First Name')}}</label>
    <input name="second_name" id="second_name" type="text" value="{{Auth::user()->second_name}}">
    <label for="second_name">{{__('Second Name')}}</label>

    <button type="submit">{{__('Save')}}</button>
</form>