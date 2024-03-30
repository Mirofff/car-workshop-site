@props(['required' => false])

<input {{ $attributes->merge(['class' => 'form-control'])}} {{$required ? 'required' : ''}}>