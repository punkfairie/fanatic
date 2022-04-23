<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title', 'Fanatic')</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<nav class="l-nav">
		@yield('nav')
	</nav>

	<main class="l-main">
		@yield('content')
	</main>
</body>
</html>