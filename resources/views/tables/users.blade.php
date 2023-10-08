@include('header')

<html>

<main class="d-flex flex-nowrap">
    @include('tables.sidebar')

    <div class="w-100">
        <table class="table">
            <thead>
                <tr style="height: 50px">
                    <th scope='row'>#</th>
                    <th scope='row'>Name</th>
                    <th scope='row'>First Name</th>
                    <th scope='row'>Second Name</th>
                    <th scope='row'>Last Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr style="height: 50px">
                        <td scope='row'>{{ $user->id }}</td>
                        <td scope='row'>{{ $user->name }}</td>
                        <td scope='row'>{{ $user->first_name }}</td>
                        <td scope='row'>{{ $user->second_name }}</td>
                        <td scope='row'>{{ $user->last_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@include('footer')


</html>
