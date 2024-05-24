@props(['required' => false])

<select {{ $attributes->merge(['class' => 'form-select'])}} {{$required ? 'required' : ''}}>
    {{$slot}}
</select>
