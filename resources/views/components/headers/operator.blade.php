@include('components.head')
@if(Auth::user()->getRole() == \App\Enums\UserRole::Operator)

    @include('components.header', ['links' => [
        __('Statements') => route('panel.statements'),
        __('Vehicles') => route('panel.vehicles'),
        __('Used Consumables') => route('panel.used_consumables'),
        __('Used Services') => route('panel.used_services'),
        ],
    ])

@endif
