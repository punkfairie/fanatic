@props([
	'object',
	'route',
	'btnClass'  => 'l-page-nav__link',
	'label'     => 'Delete',
	'adminNav' => false
])

@php
	$class = join('', array_slice(explode('\\', get_class($object)), -1));
@endphp

	<button form="delete-{{ $class }}-{{ $object->id }}" class="{{ $btnClass }}" title="delete">
		@if ($adminNav)
			<span class="l-nav__link">
		@endif
				{{ $label }}
		@if ($adminNav)
			</span>
		@endif
	</button>
<form action="{{ route("$route", $object) }}" class="form--hidden"
	  id="delete-{{ $class }}-{{ $object->id }}" method="post">

	@csrf
	@method('DELETE')

</form>