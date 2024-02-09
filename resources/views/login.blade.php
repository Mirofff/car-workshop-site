<form action="{{route('authenticate')}}" method="post">
    @csrf

    <input name="email" id="email" type="text">
    <label for="email">{{__('Email')}}</label>

    <input name="password" id="password" type="password">
    <label for="password">{{__('Password')}}</label>

    <button type="submit">{{__("Login")}}</button>
</form>