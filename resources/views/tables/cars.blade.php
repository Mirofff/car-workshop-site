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
                            <th>Model</th>
                            <th>License</th>
                            <th>VIN</th>
                            <th>Year</th>
                            <th>Engine</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->model }}</td>
                                <td>{{ $row->license_plate }}</td>
                                <td>{{ $row->vin }}</td>
                                <td>{{ $row->year }}</td>
                                <td>{{ $row->engine }}</td>
                                <td>
                                    <form method="post" action="{{route('edit-car')}}">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $row->id }}">

                                        <button class="btn btn-secondary" type="submit">
                                            🖊
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ config('constants.USERS_TABLE_URL_DELETE') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                        <button class="btn btn-secondary" name="id" type="submit"
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

                    <button type="submit" name="add" class="btn btn-primary">+</button>
                </form>
            </div>

        </div>
    </main>
</body>

</html>
