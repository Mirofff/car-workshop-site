<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body>
    @include('header')

    <table class="table">
        <tr>
            <th>#</th>
            <th>Part</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Sum</th>
        </tr>
        @foreach ($parts as $part)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $part->name }}
                </td>
                <td>
                    {{ $part->quantity }}
                </td>
                <td>
                    {{ $part->price }}
                </td>
                <td>
                    {{ $part->price * $part->quantity }}
                </td>
            </tr>
        @endforeach
    </table>
    <h4>Full sum: {{ $parts_full_sum }}</h4>

    <table class="table">
        <tr>
            <th>#</th>
            <th>Service</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Sum</th>
        </tr>
        @foreach ($services as $service)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $service->name }}
                </td>
                <td>
                    {{ $service->quantity }}
                </td>
                <td>
                    {{ $service->price }}
                </td>
                <td>
                    {{ $service->price * $service->quantity }}
                </td>
            </tr>
        @endforeach
    </table>
    <h4>Full sum: {{ $services_full_sum }}</h4>

    <h3>Total sum: {{ $services_full_sum + $parts_full_sum }}</h3>
    @include('footer')
</body>

</html>
