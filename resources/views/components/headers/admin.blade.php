@include('components.head')
@include('components.header', ['links' => [
    __('Statements') => route('panel.statements'),
    __('Vehicles') => route('panel.vehicles'),
    __('Used Consumables') => route('panel.uconsumables'),
    __('Used Services') => route('panel.uservices'),
    __('Users') => route('panel.users'),
    __('Models') => route('panel.models'),
    __('Marks') => route('panel.marks'),
    __('Stuff') => route('panel.stuff'),
    __('Workshops') => route('panel.workshops'),
    __('Services') => route('panel.services'),
    __('Consumables') => route('panel.consumables'),
    ],
])
