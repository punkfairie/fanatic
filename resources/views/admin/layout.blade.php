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
				<a class="l-nav__tab" href="#"><span class="l-nav__link">dashboard</span></a>
				<a class="l-nav__tab" href="#"><span class="l-nav__link">joined</span></a>
				<a class="l-nav__tab" href="#"><span class="l-nav__link">owned</span></a>
				<a class="l-nav__tab" href="#"><span class="l-nav__link">collective</span></a>
			</nav>
		@endauth

		<main class="l-main">
			@yield('title')

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