{{-- expected attributes: name --}}

@props([
    'divClass'   => '',
    'value'      => '1',
    'inputClass' => '',
    'current'    => null,
    'labelClass' => '',
    'label'
])

<div class="form__checkbox {{ $divClass }}">
    <input type="checkbox" id="{{ $attributes['id'] ?? $attributes['name'] }}" {{ $attributes }}
           value="{{ $value }}" class="form__input--checkbox {{ $inputClass }}"
           @checked(old($attributes['name'], $current))>
    <label for="{{ $attributes['id'] ?? $attributes['name'] }}"
           class="form__label--checkbox {{ $labelClass }}">
        {{ $label }}
    </label>
</div>