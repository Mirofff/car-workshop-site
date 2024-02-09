@include('components.head')
@if(Auth::user()->getRole() == \App\Enums\UserRole::Operator)
    @include('components.headers.operator')
@elseif(Auth::user()->getRole() == \App\Enums\UserRole::Admin)
    @include('components.headers.admin')
@endif

@include('components.table', ['items' => $users, 'get_route' => 'user.get'])
