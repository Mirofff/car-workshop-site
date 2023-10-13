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
                            <th>Is active</th>
                            <th>Is admin</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->first_name }}</td>
                                <td>{{ $row->first_name }}</td>
                                <td>{{ $row->second_name }}</td>
                                <td>{{ $row->last_name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ $row->is_active }}</td>
                                <td>{{ $row->is_admin }}</td>
                                <td>
                                    <form method="post">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                        <input type="hidden" name="id" value="{{ $row->id }}" />
                                        <input type="hidden" name="name" value="{{ $row->first_name }}" />
                                        <input type="hidden" name="name" value="{{ $row->first_name }}" />
                                        <input type="hidden" name="first_name" value="{{ $row->first_name }}" />
                                        <input type="hidden" name="second_name" value="{{ $row->second_name }}" />
                                        <input type="hidden" name="last_name" value="{{ $row->last_name }}" />
                                        <input type="hidden" name="email" value="{{ $row->email }}" />
                                        <input type="hidden" name="phone" value="{{ $row->phone }}" />
                                        <input type="hidden" name="is_active" value="{{ $row->is_active }}" />
                                        <input type="hidden" name="is_admin" value="{{ $row->is_admin }}" />

                                        <button class="btn btn-secondary fs-4" name="edit" type="submit">
                                            🖊
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/delete-user" method="POST">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                        <button class="btn btn-secondary fs-4" name="id" type="submit"
                                            onSubmit="return confirm('Are you sure?')"
                                            value="{{ $row->id }}">✞</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form method="post" action="" class="col-12 d-flex justify-content-center">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <button type="submit" name="add" class="btn btn-primary fs-2">+</button>
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
