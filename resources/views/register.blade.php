<form action="{{route('signup')}}" method="post">
    @csrf
    <input name="last_name" id="last_name" type="text">
    <label for="last_name">{{__('Last Name')}}</label>

    <input name="first_name" id="first_name" type="text">
    <label for="first_name">{{__('First Name')}}</label>

    <input name="second_name" id="second_name" type="text">
    <label for="second_name">{{__('Second Name')}}</label>

    <input name="email" id="email" type="email">
    <label for="email">{{__('Email')}}</label>

    <input name="password" id="password" type="password">
    <label for="password">{{__('Password')}}</label>

    <button type="submit">{{__('Register')}}</button>
</form>