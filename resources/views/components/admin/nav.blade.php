@props(['section'])

@switch ($section)
	@case('joined')
		<a href="{{ route('joined.index') }}" class="l-page-nav__link">All Joined</a>
		<a href="{{ route('joined.create') }}" class="l-page-nav__link">Add New</a>
		@break
	@case('owned')

		@break
	@default

@endswitch