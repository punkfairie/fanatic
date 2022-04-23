{{-- expected attributes: name, id --}}
@props(['categories', 'prevCats' => false])

@php
	$selected = null;
	$name = rtrim($attributes['name'], '[]');
	if (old($name) != null) {
		$selected = collect(old($name));
	} else if ($prevCats) {
		$selected = $prevCats;
	}
@endphp

<select {{ $attributes }} class="form__select" size="6">
	@foreach ($categories as $cat)
		<option value="{{ $cat->id }}"
			@if(isset($selected)) @selected($selected->search($cat->id) !== false) @endif>
			{{ $cat->name }}
		</option>
	@endforeach
</select>