@php use App\Enums\UserRole; @endphp
@include('components.head')
<main class="row h-100 justify-content-center align-items-center">
    <form class="w-25" action="{{route('admin.models.put', ['id' => $item->id])}}"
          method="post">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="email">{{__('Email')}}</label>
            <input class="form-control" type="email" name="email" id="email" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="last_name">{{__('Last Name')}}</label>
            <input class="form-control" type="text" name="last_name" id="last_name" value="{{$user->last_name}}">
        </div>

        <div class="form-group">
            <label for="first_name">{{__('First Name')}}</label>
            <input class="form-control" type="text" name="first_name" id="first_name" value="{{$user->first_name}}">
        </div>

        <div class="form-group">
            <label for="second_name">{{__('Second Name')}}</label>
            <input class="form-control" type="text" name="second_name" id="second_name" value="{{$user->second_name}}">
        </div>

        <div class="form-group">
            <label for="is_active">{{__('Is active')}}</label>
            <input class="form-check-inline" type="checkbox" name="is_active"
                   id="is_active" @checked(old('is_active', $user->is_active))>
        </div>

        <div class="form-group">
            <label for="role">{{__('Client')}}</label>
            <select class="form-select" name="role" id="role">
                @foreach(UserRole::cases() as $role)
                    <option value="{{$role}}" @selected(old('role') == $role)>{{$role}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button class="form-control" type="submit">{{__('Save')}}</button>
        </div>


        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
        @endif
    </form>
</main>
