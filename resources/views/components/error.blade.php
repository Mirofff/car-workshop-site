<div style="position: fixed; bottom: 20px; right: 20px">
    @foreach ($errors->all() as $error)
        <div style="width: 300px" class="alert alert-{{$alertType}}" role="alert">{{ $error }}</div>
    @endforeach
</div>