<!DOCTYPE html>
<html lang="en">
	<head>
		<link href="{!! URL::asset('public/css/bootstrap.min.css'); !!}" rel="stylesheet">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href="{!! URL::asset('public/css/main.css'); !!}" rel="stylesheet">
        <title>T&amp;LT DB</title>
	</head>
    <body>
        <header>
            <div class="container">
                <div id="banner"></div>
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Teaching &amp; Learning Technologies Database</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="{{ action('FacultyController@index') }}">Home <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">Add Faculty</a></li>
                                @if (!Request::is("auth/login"))
                                    @if (!Auth::check())
                                        <li><a href="{{ action('AuthController@index') }}">Login</a></li>
                                    @else
                                        <li><a href="{{ action('AuthController@logout') }}">Logout</a></li>
                                    @endif
                                @endif
                            </ul>
                            <form class="navbar-form navbar-right" role="search" action="{{ action('SearchController@index') }}" method="get">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search" name="q" value="{{ @$_REQUEST['q'] }}">
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </header>
        <div class="container">
            @include('partials.flash')
            @if (!Request::is("auth/login"))
                @if (Auth::check())
                    <div class="text-right" style="margin-top:-7px;margin-bottom:15px;">Welcome, {{ Auth::user()->name }}!</div>
                @else
                    <div class="text-right" style="margin-top:-7px;margin-bottom:15px;">Hello Guest!</div>
                @endif
            @endif
            @yield('content')
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </body>
</html>