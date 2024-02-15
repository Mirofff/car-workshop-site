@include('components.head')
@include('components.header', ['links' => [
    __('Statements') => route('admin.statements'),
    __('Vehicles') => route('admin.vehicles'),
    __('Used Consumables') => route('admin.uconsumables'),
    __('Used Services') => route('admin.uservices'),
    __('Users') => route('admin.users'),
    __('Models') => route('admin.models'),
    __('Marks') => route('admin.marks'),
    __('Stuff') => route('admin.stuff'),
    __('Workshops') => route('admin.workshops'),
    __('Services') => route('admin.services'),
    __('Consumables') => route('admin.consumables'),
    ],
])
