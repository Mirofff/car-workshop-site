<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body>
    @include('header')

    <div class="py-3 min-vh-100 d-flex flex-column" style="background-color: rgb(214, 214, 214); width: 400px">
        <form action="{{ route('reports.revanue') }}">
            <div class="mb-3">
                <h3>Revenue for the period</h3>
                <label for="exampleFormControlInput1" class="form-label">Start date</label>
                <input type="date" name="start_date" class="form-control">

                <label for="exampleFormControlInput1" class="form-label">End date</label>
                <input type="date" name="end_date" class="form-control">

                <input type="submit" class="btn btn-primary" value="Get Report">
            </div>
        </form>
        <form action="{{ route('reports.repairs') }}">
            <div class="mb-3">
                <h3>Repairs by car brand</h3>
                <label for="exampleFormControlTextarea1" class="form-label">Get orders by car marks</label>

                <input type="submit" class="btn btn-primary" value="Get Report">
            </div>
        </form>
    </div>

    @include('footer')
</body>

</html>
