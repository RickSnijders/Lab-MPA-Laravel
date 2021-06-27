<!DOCTYPE html>
<html lang="en">
<head>
    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>@yield('title')</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
  		<a class="navbar-brand" href="/">Jukebox</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarNav">
    		<ul class="navbar-nav">
      			<li class="nav-item active">
        			<a class="nav-link" href="/">Home</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="/queue">Queue</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="#">Playlists</a>
      			</li>
				@if(!isset(Auth::user()->email))
      			<li class="nav-item">
        			<a class="nav-link" href="/login">Login</a>
      			</li>
				@endif
				  <li class="nav-item">
        			<a class="nav-link" href="/logout">Logout</a>
      			</li>
    		</ul>
			
  		</div>
		@if(isset(Auth::user()->email))
		<p class="nav-item m-2">{{Auth::user()->email}} </p>
		@endif
	</nav>
	@yield('content')

</body>
</html>