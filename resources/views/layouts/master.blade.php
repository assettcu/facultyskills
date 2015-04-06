<!DOCTYPE html>
<html lang="en">
	<head>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		<link href="{!! URL::asset('public/css/main.css'); !!}" rel="stylesheet">
	</head>
    <body>
        <header>
            <div class="container">
                <div id="banner"></div>
                <div id="navbar">
                    <h2>Faculty Skills</h2>
                </div>
            </div>
        </header>
        <div class="container">
            @yield('content')
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </body>
</html>