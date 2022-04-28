@props(['section'])

@switch ($section)
	@case('joined')
		<a href="{{ route('admin.joined.index') }}" class="l-page-nav__link">All Joined</a>
		<a href="{{ route('admin.joined.create') }}" class="l-page-nav__link">Add New</a>
		@break
	@case('owned')
        <a href="{{ route('admin.owned.index') }}" class="l-page-nav__link">All Owned</a>
        <a href="{{ route('admin.owned.create') }}" class="l-page-nav__link">Add New</a>
		@break
	@default

@endswitch