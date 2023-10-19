<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body>
    <main style="height: 90vh;" class="d-flex flex-column justify-content-center align-items-center">
        <form class="d-flex flex-column w-25" method="post" action="{{ route('edit-car-action') }}">
            @csrf

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">License</label>
                <input type="text" class="form-control" name="license_plate" placeholder="License Plate"
                    value="{{ $car->license_plate }}">
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">VIN</label>
                <input type="text" class="form-control" name="vin" placeholder="VIN" value="{{ $car->vin }}">
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Year</label>
                <input type="number" class="form-control" name="year" placeholder="year"
                    value="{{ $car->year }}">
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Mileage</label>
                <input type="number" class="form-control" name="mileage" placeholder="mileage"
                    value="{{ $car->mileage }}">
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Register sign</label>
                <input type="text" class="form-control" name="register_sign" placeholder="register sign"
                    value="{{ $car->register_sign }}">
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Models</label>
                <select name="model_id" class="form-select" id="inputGroupSelect01">
                    @foreach ($models as $row)
                        <option value="{{ $row->id }}" @if ($car->model_id == $row->id) selected @endif>
                            {{ $row->model }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Marks</label>
                <select name="mark_id" class="form-select" id="inputGroupSelect01">
                    @foreach ($marks as $row)
                        <option value="{{ $row->id }}" @if ($car->mark_id == $row->id) selected @endif>
                            {{ $row->mark }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Engines</label>
                <select name="engine_id" class="form-select" id="inputGroupSelect01">
                    @foreach ($engines as $row)
                        <option value="{{ $row->id }}" @if ($car->engine_id == $row->id) selected @endif>
                            {{ $row->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="id" value="{{ $car->id }}">
            <input type="submit" value="Save">

        </form>
    </main>

    @include('footer')
</body>

</html>
