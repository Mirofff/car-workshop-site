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
                            <th>Date</th>
                            <th>Reason</th>
                            <th>Vin</th>
                            <th>Car</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->reason }}</td>
                                <td>{{ $row->vin }}</td>
                                <td>{{ $row->mark . ' ' . $row->model . ' ' . $row->year }}</td>
                                <td>

                                    <input type="hidden" name="id" />
                                    <input type="hidden" name="date" />
                                    <input type="hidden" name="reason" />
                                    <input type="hidden" name="vin" />
                                    <input type="hidden" name="mark" />
                                    <input type="hidden" name="model" />
                                    <input type="hidden" name="year" />

                                    </form>
                                </td>
                                <td>
                                    <form action="{{ config('constants.ORDERS_TABLE_URL_DELETE') }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf

                                        <button class="btn btn-secondary" name="id" type="submit"
                                            value="{{ $row->id }}">✞</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form method="post" action="" class="col-12 d-flex justify-content-center">
                    @csrf

                    <button type="submit" name="add" class="btn btn-primary">+</button>
                </form>
                <form method="post" action="" class="col-12 d-flex justify-content-center">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <button type="submit" name="add" class="btn btn-primary">+</button>
                </form>
            </div>

            @isset($_POST['add'])
                @include('tables.forms.order.add')
            @endisset

            <form method="post" action="{{ config('constants.EXPORT_ORDER_DOCX') }}">
                @csrf

                <button name="id" value="1" class="btn btn-primary" type="submit">export</button>
            </form>
        </div>
    </main>
</body>

</div>
