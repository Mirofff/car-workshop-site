<form class="d-flex flex-column mx-auto mb-5 mt-auto" method="post"
    action="{{ config('constants.ORDERS_TABLE_URL_EXTEND_SERVICES') }}">
    @csrf

    <div class="list-group">
        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">Reason</label>
            <input type="text" name="reason" class="form-control" placeholder="Reason" required>
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">Client</label>
            <select name="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value='{{ $user->id }}'>
                        {{ $user->last_name . ' ' . $user->first_name[0] . '. ' . $user->second_name[0] . '.' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">Car</label>
            <select name="car_id" class="form-control">
                @foreach ($cars as $car)
                    <option value='{{ $car->id }}'>{{ $car->mark . ' ' . $car->model . ' ' . $car->year . ' ' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">Recommendations</label>
            <input type="text" name="recommendations" class="form-control" placeholder="Recommendations" required>
        </div>
        <button type="submit" class="button">Save</button>
    </div>
</form>
