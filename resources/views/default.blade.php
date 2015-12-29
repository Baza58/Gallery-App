<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('head')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	@include('includes.nav')
	@yield('modal')
		<div class="container">

			@include('includes.info')
			@yield('content')
		</div>	
	@include('includes.footer')
	@yield('scripts')
</body>
</html>