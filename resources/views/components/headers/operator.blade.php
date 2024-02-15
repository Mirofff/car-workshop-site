@include('components.head')
@if(Auth::user()->getRole() == \App\Enums\UserRole::Operator)

    @include('components.header', ['links' => [
        __('Statements') => route('admin.statements'),
        __('Vehicles') => route('admin.vehicles'),
        __('Used Consumables') => route('admin.used_consumables'),
        __('Used Services') => route('admin.used_services'),
        ],
    ])

@endif
