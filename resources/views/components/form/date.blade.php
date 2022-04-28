{{-- expected attributes: name --}}
@props([
    'labelClass' => '',
    'label',
    'current'    => null,
    'inputClass' => '',
    'errorClass' => '',
])

<label for="{{ $attributes['id'] ?? $attributes['name'] }}" class="form__label {{ $labelClass }}">
    {{ $label }}
</label>
<input type="date" id="{{ $attributes['id'] ?? $attributes['name'] }}" {{ $attributes }}
       value="{{ old($attributes['name'], $current?->format(FORM_DATE_FMT)) }}"
       class="form__input {{ $inputClass }}">
@error($attributes['name']) <p class="form__error {{ $errorClass }}">{{ $message }}</p> @enderror