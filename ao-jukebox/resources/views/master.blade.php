<!DOCTYPE html>
<html lang="en">
<head>
    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&family=Poppins:wght@200&family=Roboto+Mono:wght@100&family=Space+Mono&display=swap" rel="stylesheet">
	
	<title>@yield('title')</title>
</head>
<body>
	<nav class="bgcolor navb">
  		<a class="title" href="/">Jukebox</a>
  		<div class="navitems" id="">
      			<div class="color1 navi active">
        			<a class="" href="/">Home</a>
					</div>
      			<div class="color2 navi">
        			<a class="" href="/queue">Queue</a>
				</div>
      			<div class="color3 navi">
        			<a class="" href="/playlist">Playlists</a>
				</div>
				@if(!isset(Auth::user()->email))
      			<div class="color4 navi">
        			<a class="" href="/login">Login</a>
				</div>
				@endif
				@if(isset(Auth::user()->email))
				<div class="color4 navi">
        			<a class="" href="/logout">Logout</a>
				</div>
				@endif
				@if(isset(Auth::user()->email))
				<div class="color5 navi user">
					<a href="">{{Auth::user()->email}}</a> 
				</div>
				@endif
  		</div>
		
	</nav>
	@yield('content')

</body>
</html>