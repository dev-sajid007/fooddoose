<!DOCTYPE html>
<html>
	<head>
		@include('frontend.include.css')
	</head>
	<body>
		@include('frontend.include.header')
		@yield('content')
		@yield('js')
		@include('frontend.include.js')
	</body>
</html>