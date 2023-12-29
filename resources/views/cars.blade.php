<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body>
    @include('header')

    <div class="d-flex flex-column mx-auto mb-5 mt-auto w-50 py-5">
        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="input-group-text" for="inputGroupSelect01">Models</label>
            <select class="form-select" id="inputGroupSelect01">
                @foreach ($marks as $row)
                    <option value="{{ $row->id }}">
                        {{ $row->mark }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <form class="d-flex flex-column mx-auto mb-5 mt-auto w-50 py-5" method="post" action="{{ route('user.add-car') }}">
        @csrf

        <div class="list-group">
            <div class="list-group-item list-group-item-action w-100 d-flex">
                <label class="form-label">Year</label>
                <input type="number" name="year" class="form-control" required>
            </div>
            <div class="list-group-item list-group-item-action w-100 d-flex">
                <label class="form-label">VIN</label>
                <input type="text" name="vin" class="form-control" required>
            </div>
            <div class="list-group-item list-group-item-action w-100 d-flex">
                <label class="form-label">Register Sign</label>
                <input type="text" name="register_sign" class="form-control" required>
            </div>
            <div class="list-group-item list-group-item-action w-100 d-flex">
                <label class="form-label">Mileage</label>
                <input type="number" name="mileage" class="form-control" required>
            </div>
            <div class="list-group-item list-group-item-action w-100 d-flex">
                <label class="form-label">License plate</label>
                <input type="text" name="license_plate" class="form-control" placeholder="Reason" required>
            </div>

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


            <div class="list-group-item list-group-item-action w-100 d-flex">
                <label class="input-group-text" for="inputGroupSelect01">Models</label>
                <select name="model_id" class="form-select" id="inputGroupSelect01">
                    @foreach ($models as $row)
                        <option value="{{ $row->id }}">
                            {{ $row->model }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="list-group-item list-group-item-action w-100 d-flex">
                <label class="input-group-text" for="inputGroupSelect01">Engines</label>
                <select name="engine_id" class="form-select" id="inputGroupSelect01">
                    @foreach ($engines as $row)
                        <option value="{{ $row->id }}">
                            {{ $row->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>


    <table class="table">
        <tr>
            <th>#</th>
            <th>vin</th>
            <th>Auto</th>
            <th>Year</th>
        </tr>
        @foreach ($cars as $car)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $car->vin }}</td>
                <td>{{ $car->register_sign }}</td>
                <td>{{ $car->year }}</td>
            </tr>
        @endforeach
    </table>

    @include('footer')
</body>

</html>
