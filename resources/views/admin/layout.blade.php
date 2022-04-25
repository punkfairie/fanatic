<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title', 'Fanatic')</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">
	<link rel="stylesheet" href="/css/admin/style.css">
</head>
<body>
	<div class="l-container">

		@auth
			<nav class="l-nav">
				<a href="{{ route('admin.dashboard') }}" class="l-nav__tab">
					<span class="l-nav__link">dashboard</span>
				</a>

				<a href="{{ route('admin.joined.index') }}" class="l-nav__tab">
					<span class="l-nav__link">joined</span>
				</a>

				<a href="#" class="l-nav__tab"><span class="l-nav__link">owned</span></a>
				<a href="#" class="l-nav__tab"><span class="l-nav__link">collective</span></a>

				<x-admin.form.destroy :btnClass="'l-nav__tab'" :object="auth_collective()"
				                      :route="'admin.sessions.destroy'" :adminNav="true"
									  :label="'log out'" />
			</nav>
		@endauth

		<main class="l-main">
			<nav class="l-page-nav">
				<h1><span>@yield('pg-title')</span></h1>

				<div class="l-page-nav__links">@yield('pg-nav')</div>
			</nav>

			@if (session()->has('success'))
				<p class="success">{{ session()->get('success') }}</p>
			@endif

			@if (session()->has('error'))
				<p class="error">{{ session()->get('error') }}</p>
			@endif

			@if (session()->has('warning'))
				<p class="warning">{{ session()->get('warning') }}</p>
			@endif

			@yield('content')
		</main>

	</div>
</body>
</html>