{{-- expected attributes: name --}}
@props([
    'prevVals'    => false,
    'vals'        => false,
    'labelClass'  => '',
    'selectClass' => '',
    'errorClass'  => '',
    'size'        => 6,
    'label',
    ])

@php
    $id = $attributes['id'] ?? rtrim($attributes['name'], '[]');

	$selected = null;
	$name = rtrim($attributes['name'], '[]');
	if (old($name) != null) {
		$selected = collect(old($name));
	} else if ($prevVals) {
		$selected = collect($prevVals);
	}

    if (!$vals) {
        switch ($name) {
            case 'status':
                $vals = ['upcoming', 'current'];
                break;

            default:
                break;
        }
    }
@endphp

<label for="{{ $id }}" class="form__label {{ $labelClass }}">{{ $label }}</label>
<select id="{{ $id }}" {{ $attributes }} class="form__select {{ $selectClass }}" size="{{ $size }}">
    @if (!isset($attributes['multiple']))
        <option value=""></option>
    @endif

	@foreach ($vals as $val)
		<option value="{{ $val }}"
			@if(isset($selected)) @selected($selected->search($val) !== false) @endif>
			{{ $val }}
		</option>
	@endforeach
</select>
@error($attributes['name']) <p class="form__error {{ $errorClass }}">{{ $message }}</p> @enderror