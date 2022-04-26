@props([
    'labelClass' => '',
    'label'      => 'Image:',
    'accept'     => 'image',
    'inputClass' => '',
    'formClass'  => '',
])

<label for="{{ $attributes['id'] ?? $attributes['name'] }}" class="form__label {{ $labelClass }}">
    {{ $label }}
</label>
<input type="file" id="{{ $attributes['id'] ?? $attributes['name'] }}" {{ $attributes }}
       value="{{ old($attributes['name']) }}" accept="{{ $accept }}/*"
       class="form__input--file {{ $inputClass }}">
@error($attributes['name']) <p class="form__error {{ $formClass }}">{{ $message }}</p> @enderror