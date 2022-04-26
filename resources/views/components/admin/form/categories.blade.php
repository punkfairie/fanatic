{{-- expected attributes: name, id --}}
@props([
    'prevCats'    => false,
    'labelClass'  => '',
    'selectClass' => '',
    'errorClass'  => '',
    ])

@php
    use App\Models\Category;
    $categories = Category::all();

    $id = rtrim($attributes['name'], '[]');

	$selected = null;
	$name = rtrim($attributes['name'], '[]');
	if (old($name) != null) {
		$selected = collect(old($name));
	} else if ($prevCats) {
		$selected = $prevCats->pluck('id');
	}
@endphp

<label for="{{ $id }}" class="form__label {{ $labelClass }}">Categories:</label>
<select id="{{ $id }}" {{ $attributes }} class="form__select {{ $selectClass }}" size="6">
	@foreach ($categories as $cat)
		<option value="{{ $cat->id }}"
			@if(isset($selected)) @selected($selected->search($cat->id) !== false) @endif>
			{{ $cat->name }}
		</option>
	@endforeach
</select>
@error($attributes['name']) <p class="form__error {{ $errorClass }}">{{ $message }}</p> @enderror