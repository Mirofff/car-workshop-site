<!DOCTYPE html>
<html lang="en">

</head>
@include('head')
<html>

{{-- <style>
    tbody > tr {
        height: 25px;
    }
</style> --}}

<body>
    <main class="d-flex flex-nowrap">
        @include('tables.sidebar')

        <div class="d-flex flex-wrap flex-grow-1" style="height: auto; min-height: 100vh;">
            <div class="table-wrapper w-100">
                <table class="table table-fixed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>First Name</th>
                            <th>Second Name</th>
                            <th>Last Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->second_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>
                                    <form method="post">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                        <input type="hidden" name="id" value="{{ $user->id }}" />
                                        <input type="hidden" name="name" value="{{ $user->name }}" />
                                        <input type="hidden" name="name" value="{{ $user->name }}" />
                                        <input type="hidden" name="first_name" value="{{ $user->first_name }}" />
                                        <input type="hidden" name="second_name" value="{{ $user->second_name }}" />
                                        <input type="hidden" name="last_name" value="{{ $user->last_name }}" />
                                        <input type="hidden" name="email" value="{{ $user->email }}" />
                                        <input type="hidden" name="password" value="{{ $user->password }}" />
                                        <input type="hidden" name="active" value="{{ $user->active }}" />
                                        <input type="hidden" name="is_admin" value="{{ $user->is_admin }}" />

                                        <button class="fs-4" name="edit" type="submit">
                                            🖊
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/delete-user" method="POST">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <button class="fs-4" name="id" type="submit"
                                            onsubmit="return confirm('Are you sure?')"
                                            value="{{ $user->id }}">✞</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form method="post" action="">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <button type="submit" name="add" class="button fs-2">+</button>
                </form>
            </div>

            @if (isset($_POST['add']) || isset($_POST['edit']))
                <form class="d-flex flex-column mx-auto mb-5 mt-auto" method="post"
                    @isset($_POST['add'])
                    action="/add-user"
                @endisset
                    @isset($_POST['edit'])
                    action="/edit-user"
                @endisset>
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="list-group">
                        <div class="list-group-item list-group-item-action w-100 d-flex">
                            <label class="form-label">User Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name"
                                value="{{ $_POST['name'] ?? '' }}" required="">
                        </div>

                        <div class="list-group-item list-group-item-action w-100 d-flex">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="Frist Name"
                                value="{{ $_POST['first_name'] ?? '' }}" required="">
                        </div>

                        <div class="list-group-item list-group-item-action w-100 d-flex">
                            <label class="form-label">Second Name</label>
                            <input type="text" name="second_name" class="form-control" placeholder="Second Name"
                                value="{{ $_POST['second_name'] ?? '' }}" required="">
                        </div>

                        <div class="list-group-item list-group-item-action w-100 d-flex">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                value="{{ $_POST['last_name'] ?? '' }}" required="">
                        </div>

                        <div class="list-group-item list-group-item-action w-100 d-flex">
                            <label class="form-label">User Email</label>
                            <input type="email" name="email" class="form-control" placeholder="User Email"
                                value="{{ $_POST['email'] ?? '' }}" required="">
                        </div>

                        <div class="list-group-item list-group-item-action w-100 d-flex">
                            <label class="form-label">User Password</label>
                            <input type="password" name="password" class="form-control" placeholder="User Email"
                                value="{{ $_POST['password'] ?? '' }}" required="">
                        </div>

                        <div class="list-group-item list-group-item-action w-100 d-flex">
                            <label class="form-label">Is Admin</label>
                            <input type="hidden" name = "is_admin" value="0">
                            <input type="checkbox" name="is_admin" class="form-check-input"
                                style="margin-left: 20px" placeholder="Last Name"
                                @if ($_POST['active'] == 1) checked @endif value="1">
                        </div>

                        <div class="list-group-item list-group-item-action w-100 d-flex">
                            <label class="form-label">Active</label>
                            <input type="hidden" name = "active" value="0">
                            <input type="checkbox" name="active" class="form-check-input" style="margin-left: 20px"
                                placeholder="Last Name" @if ($_POST['active'] == 1) checked @endif
                                value="1">
                        </div>
                        <button type="submit"
                            @isset($_POST['id'])
                            value="{{ $_POST['id'] ?? '' }}"
                            name="id"
                        @endisset
                            class="button">Save</button>
                    </div>
                </form>
            @endif
        </div>
    </main>
</body>

</html>
