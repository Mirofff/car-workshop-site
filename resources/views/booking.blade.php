<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body class="d-flex flex-column">
    @include('header')

    <div class="d-flex flex-column justify-content-center align-items-center m-5">
    <h2>Booking</h2>
        <form method="post" action="{{ route('booking-action') }}" class="w-50">
            @csrf
            <input type="date" class="form-control" name="date" min="{{ date('Y-m-d') }}">
            <input class="form-control" type="time" name="hour" step="3600">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <input type="submit" class="btn btn-primary m-3" value="Book">
        </form>
        @if ($errors->any())
            <h4>{{ $errors->first() }}</h4>
        @endif
    </div>

    <table class="table w-100 table-fixed">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Hour</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->date }}</td>
                    <td>{{ $row->hour }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('footer')
</body>

</html>
