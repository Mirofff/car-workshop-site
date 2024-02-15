<x-layout>
    <div class="w-25">
        <form action="{{route('signin')}}" method="post">
            @csrf
            <h1 class="h3 mb-3 fw-normal">{{__('Enter statement info')}}</h1>

            <div class="w-25">
                <input disabled type="email" name="vehicle_uuid" class="form-control" id="vehicle_uuid">
                <label for="vehicle_uuid">{{__('Client UUID')}}</label>
            </div>

            <div class="w-25">
                <input disabled type="email" name="client_uuid" class="form-control" id="client_uuid">
                <label for="client_uuid">{{__('Client UUID')}}</label>
            </div>

            <div class="w-25">
                <select class="form-select" multiple aria-label="multiple select example">
                    @foreach(\App\Enums\StatementStatus::cases() as $status)
                        <option value="{{ $status }}" @selected(old('status') == $status)>
                            {{ __($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">{{__('Save')}}</button>
        </form>
    </div>

    <x-error/>
</x-layout>