<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	{{-- CSRF Token --}}
	@csrf

	<title>@yield('title', 'LBBS') - LBBS论坛</title>

	{{-- CSS Style --}}

	<link rel="stylesheet" href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>

	<div id="app" class="{{ route_class() }}-page">
		@include('layouts._header')

		<div class="container">
			@include('shared._messages')

			@yield('content')

		</div>

		@include('layouts._footer')
	</div>
	
	{{-- Script --}}

	<link rel="stylesheet" href="{{ mix('js/app.js') }}" rel="stylesheet">

</body>
</html>