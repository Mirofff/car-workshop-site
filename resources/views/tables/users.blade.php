<!DOCTYPE html>
<html lang="en">

</head>
@include('head')
<html>

<body>
    <main class="d-flex flex-nowrap">
        @include('tables.sidebar')

        <div class="d-flex flex-wrap flex-grow-1" style="height: auto; min-height: 100vh;">
            <div class="table-wrapper w-100">
                <table class="table table-fixed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Created At</th>
                            <th>First Name</th>
                            <th>Second Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Active</th>
                            <th>Admin</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <form method="post">
                                    <td><input type="hidden" name="id"
                                            value="{{ $row->id }}" />{{ $row->id }}
                                    </td>
                                    <td><input type="hidden" name="created_at"
                                            value="{{ $row->created_at }}" />{{ $row->created_at }}</td>
                                    <td><input type="hidden" name="first_name"
                                            value="{{ $row->first_name }}" />{{ $row->first_name }}</td>
                                    <td><input type="hidden" name="second_name"
                                            value="{{ $row->second_name }}" />{{ $row->second_name }}</td>
                                    <td><input type="hidden" name="last_name"
                                            value="{{ $row->last_name }}" />{{ $row->last_name }}</td>
                                    <td><input type="hidden" name="email"
                                            value="{{ $row->email }}" />{{ $row->email }}</td>
                                    <td><input type="hidden" name="phone"
                                            value="{{ $row->phone }}" />{{ $row->phone }}</td>
                                    <td><input type="hidden" name="is_operator"
                                            value="{{ $row->is_operator }}" />{{ $row->is_operator }}</td>
                                    <td> <input type="hidden" name="is_admin"
                                            value="{{ $row->is_admin }}" />{{ $row->is_admin }}</td>
                                    <td>
                                        @csrf
                                        <button class="btn btn-secondary" name="edit" type="submit">
                                            edit
                                        </button>
                                    </td>
                                </form>
                                <td>
                                    <form action="{{ config('constants.USERS_TABLE_URL_DELETE') }}"
                                        onsubmit="return confirm('Are you sure?')" method="POST">
                                        @csrf
                                        <button class="btn btn-secondary" name="id" type="submit"
                                            value="{{ $row->id }}">
                                            delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form method="post" action="" class="col-12 d-flex justify-content-center">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <button type="submit" name="add" class="btn btn-primary">+</button>
                </form>
            </div>

            @isset($_POST['add'])
                @include('tables.forms.user.add')
            @endisset

            @isset($_POST['edit'])
                @include('tables.forms.user.edit')
            @endisset

        </div>
    </main>
</body>

</html>
