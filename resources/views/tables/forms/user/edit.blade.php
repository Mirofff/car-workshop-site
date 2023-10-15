<form class="d-flex flex-column mx-auto mb-5 mt-auto" method="post"
    action="{{ config('constants.USERS_TABLE_URL_EDIT') }}">
    @csrf

    <div class="list-group">
        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" placeholder="Frist Name"
                value="{{ $_POST['first_name'] }}" required>
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">Second Name</label>
            <input type="text" name="second_name" class="form-control" placeholder="Second Name"
                value="{{ $_POST['second_name'] }}" required>
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                value="{{ $_POST['last_name'] }}" required>
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">User Email</label>
            <input type="email" name="email" class="form-control" placeholder="User Email"
                value="{{ $_POST['email'] }}" required>
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">Admin</label>
            <input class="form-check-input" style="margin-left: 20px" type="checkbox" name="is_admin" value="1"
                @checked(old('true', $_POST['is_admin'])) />
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">Active</label>
            <input type="checkbox" name="is_operator" class="form-check-input" style="margin-left: 20px"
                placeholder="Last Name" value="1" @checked(old('true', $_POST['is_operator'])) />
        </div>
        <div class="row">
            <div class="col-md-6">
                <button type="submit" value="{{ $_POST['id'] }}" name="id" class="btn-primary">Save</button>
            </div>
            <div class="col-md-6">
                <a class="btn-primary" href="{{ url()->current() }}">Discard</button>
            </div>
        </div>
    </div>
</form>
