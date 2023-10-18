<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body style="height: 100vh">
    <div class="container h-75 d-flex flex-column justify-content-center align-items-center">
        <div>
            <form method="post" action="{{ config('constants.ORDERS_TABLE_URL_EXTEND_PARTS') }}">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Part and quantity</span>
                    <select class="form-select" name="part_id" id="inputGroupSelect01">
                        @foreach ($parts as $part)
                            <option value="{{ $part->id }}" @if ($loop->first) selected @endif>
                                {{ $part->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="quantity" class="form-control">
                    <input type="hidden" name="order_id" value="{{$order_id}}" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">Save part</button>
            </form>

            <form method="post" action="{{ config('constants.ORDERS_TABLE_URL_EXTEND_SERVICES') }}">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Service and quantity</span>
                    <select class="form-select" name="service_id" id="inputGroupSelect01">
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" @if ($loop->first) selected @endif>
                                {{ $service->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="quantity" class="form-control">
                    <input type="hidden" name="order_id" value="{{$order_id}}" class="form-control">
                </div>

                <button class="btn btn-primary" type="submit">Save service</button>
            </form>
        </div>


        <div class="d-flex w-100 flex-column mb-3 align-items-baseline">
            <table class="table mb-10">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_details as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_parts as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <form method="post" action="{{config('constants.ORDERS_TABLE_URL_SAVE_DETAILS')}}">
            @csrf
            <button type="submit" name="order_id" value="{{$order_id}}">Save order details</button>
        </form>

    </div>


</body>

</html>
