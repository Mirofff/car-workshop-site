@php use App\Enums\UserRole; @endphp
@include('components.head')
@if(Auth::user()->getRole() == UserRole::Operator)
    @include('components.headers.operator')
@elseif(Auth::user()->getRole() == UserRole::Admin)
    @include('components.headers.admin')
@endif

@include('components.table', ['items' => $users])
