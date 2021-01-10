<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	</style>
	<title> @yield('title') </title>
</head>
<body>
	<div id="navbar">
		 @yield('navbar')
	</div>

	<div id="content">
		@yield('content')
	</div>

	<div id="footer">
		copyright@2020
	</div>

</body>
</html>