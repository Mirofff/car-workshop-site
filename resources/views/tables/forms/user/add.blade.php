<form class="d-flex flex-column mx-auto mb-5 mt-auto" method="post" action="/add-user" @csrf>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <div class="list-group">
        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" placeholder="Frist Name" value=""
                required="">
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">Second Name</label>
            <input type="text" name="second_name" class="form-control" placeholder="Second Name" value=""
                required="">
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" placeholder="Last Name" value=""
                required="">
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">User Email</label>
            <input type="email" name="email" class="form-control" placeholder="User Email" value=""
                required="">
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">User Phone</label>
            <input type="phone" name="phone" class="form-control" placeholder="User Phone" value=""
                required="">
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" value=""
                required="">
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">Is Admin</label>
            <input class="form-check-input" style="margin-left: 20px" type="checkbox" name="is_admin" value="1" />
        </div>

        <div class="list-group-item list-group-item-action w-100 d-flex">
            <label class="form-label">Is Active</label>
            <input type="checkbox" name="is_active" class="form-check-input" style="margin-left: 20px"
                placeholder="Is Active" value="1" />
        </div>
        <button type="submit" class="button">Save</button>
    </div>
</form>
