<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="description" content="Conference room reservation application for Geekdom. Built by Codeup students.">
		<link rel="stylesheet" href="/css/yeti-bootstrap.css">
		<link rel="stylesheet" href="/css/geekdomreservit.css">
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>

		@yield('topscript')

		@yield('title')

	</head>
	<body>

		<div id="wrapper">
			<div id="header">
				<!-- Navbar -->
				<div class="navbar navbar-default">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="http://www.geekdom.com"><img src="/img/logo-nav.png" alt="Geekdom logo"></a>
						</div>
						<div class="navbar-collapse collapse navbar-responsive-collapse">
							<ul class="nav navbar-nav navbar-right">
								@yield('navbar-link')
								<li><a href="{{{ action('RoomsController@index') }}}">Conference Rooms</a></li>
								@if (Auth::check())
									<li><a href="{{{ action('AdminController@index') }}}">Admin Panel</a></li>
			        				<li><a href=" {{{ action('HomeController@logout') }}} ">Log Out ({{{ Auth::user()->first_name }}})</a></li>
			        			@else
			        				<li><a href=" {{{ action('HomeController@showLogin') }}} ">Geekdom Staff</a></li>
			        			@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div id="content">

				@if (Auth::check())
	    		<div class="container">
					<ul class="nav nav-pills nav-justified">
					  <li><a href="{{{ action('AdminController@index') }}}">Reservation Requests</a></li>
					  <li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><a href="{{{ action('UsersController@index') }}}">User Options</a></li>
				          <li><a href="{{{ action('RoomsController@options') }}}">Conference Room Options</a></li>
				        </ul>
				      </li>
					</ul>
				</div>
				@endif

				@if (Session::has('successLoginMessage'))
	      		<div class="alert alert-success alert-dismissable center-block" id="fade_message"> 
	      			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
	      			{{{ Session::get('successLoginMessage') }}} 
	      		</div>
	    		@endif

	    		@if (Session::has('errorLoginMessage'))
	      		<div class="alert alert-danger alert-dismissable center-block" id="fade_message"> 
	      			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
	      			{{{ Session::get('errorLoginMessage') }}} 
	      		</div>
	    		@endif

	    		@if (Session::has('successLogoutMessage'))
	      		<div class="alert alert-success alert-dismissable center-block" id="fade_message"> 
	      			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
	      			{{{ Session::get('successLogoutMessage') }}} 
	      		</div>
	    		@endif

				@if (Session::has('errorCreateRoomMessage'))
	      		<div class="alert alert-danger alert-dismissable center-block" id="fade_message"> 
	      			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
	      			{{{ Session::get('errorCreateRoomMessage') }}} 
	      		</div>
	    		@endif

	    		@if (Session::has('successCreateRoomMessage'))
	      		<div class="alert alert-success alert-dismissable center-block" id="fade_message"> 
	      			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
	      			{{{ Session::get('successCreateRoomMessage') }}} 
	      		</div>
	    		@endif

	    		@if (Session::has('deleteRoom'))
	      		<div class="alert alert-success alert-dismissable center-block" id="fade_message"> 
	      			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
	      			{{{ Session::get('deleteRoom') }}} 
	      		</div>
	    		@endif

	    		@if (Session::has('errorMessage'))
	      		<div class="alert alert-danger alert-dismissable center-block" id="fade_message"> 
	      			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
	      			{{{ Session::get('errorMessage') }}} 
	      		</div>
	    		@endif

				@if (Session::has('successMessage'))
	      		<div class="alert alert-success alert-dismissable center-block" id="fade_message"> 
	      			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
	      			{{{ Session::get('successMessage') }}} 
	      		</div>
	    		@endif

	    		@if (Session::has('deleteUserMessage'))
	      		<div class="alert alert-success alert-dismissable center-block" id="fade_message"> 
	      			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
	      			{{{ Session::get('deleteUserMessage') }}} 
	      		</div>
	    		@endif
			
				@yield('content')
			
			</div>
		
			<!-- Footer -->
			<div id="footer">
				<section id="footer">
					<div class="container">
						<footer class="main-footer">
							&copy; <a href="http://omarquimbaya.com" target="_blank"><img src="/img/pandasmall.png" alt="Written by a Panda"></a> &amp; <a href="https://bengriffith.co" target="_blank"><img src="/img/Ben.png" alt="Ben"></a>
						</footer>
					</div>
				</section>
			</div>
		</div>

		<script>
			$('#fade_message').delay(2000).fadeOut(1000);
		</script>

	</body>

		@yield('bottomscript')

</html>