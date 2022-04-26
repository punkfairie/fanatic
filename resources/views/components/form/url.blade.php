{{-- expected attributes: name --}}

@props([
    'labelClass' => '',
    'label'      => 'URL:',
    'current'    => null,
    'inputClass' => '',
    'errorClass' => ''
])

<label for="{{ $attributes['name'] }}" class="form__label {{ $labelClass }}">{{ $label }}</label>
<input type="url" id="{{ $attributes['id'] ?? $attributes['name'] }}"
       value="{{ old($attributes['name'], $current) }}" class="form__input {{ $inputClass }}"
       {{ $attributes }}>
@error($attributes['name']) <p class="form__error {{ $errorClass }}">{{ $message }}</p> @enderror