<!DOCTYPE html>
<html lang="en">

</head>
@include('head')
<html>

{{-- <style>
    tbody > tr {
        height: 25px;
    }
</style> --}}

<body>
    <main class="d-flex flex-nowrap">
        @include('tables.sidebar')

        <div class="d-flex flex-wrap flex-grow-1" style="height: auto; min-height: 100vh;">
            <div class="table-wrapper w-100">
                <table class="table table-fixed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>First Name</th>
                            <th>Second Name</th>
                            <th>Last Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->second_name }}</td>
                                <td>{{ $user->last_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex flex-column mx-auto mt-auto">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action w-100 d-flex">
                        <label class="form-label">User Name</label>
                        <input type="text" class="form-control" placeholder="Name" value="" required="">
                    </div>

                    <div class="list-group-item list-group-item-action w-100 d-flex">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" placeholder="Frist Name" value=""
                            required="">
                    </div>

                    <div class="list-group-item list-group-item-action w-100 d-flex">
                        <label class="form-label">Second Name</label>
                        <input type="text" class="form-control" placeholder="Second Name" value=""
                            required="">
                    </div>

                    <div class="list-group-item list-group-item-action w-100 d-flex">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control"placeholder="Last Name" value="" required="">
                    </div>

                    <div class="list-group-item list-group-item-action w-100 d-flex">
                        <label class="form-label">Is Admin</label>
                        <input type="form-check-input" class="form-control"placeholder="Last Name" value="" required="">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
</body>

</html>
