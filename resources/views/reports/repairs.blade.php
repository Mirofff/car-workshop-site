<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body>
    @include('header')


    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Mark</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$car->mark}}</td>
                    <td>{{$car->quantity}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('footer')
</body>

</html>
