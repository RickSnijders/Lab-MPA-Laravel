@extends('master')

@section('title', 'Home')

@section('content')
	<?php $selectedGenre = 'All' ?>
	@if (isset($genreSelected))
	<?php $selectedGenre = $genreSelected ?>
    
	@endif

    <!-- Shows playlists if user is logged in -->
    @if(isset(Auth::user()->email))
    <div class="col-7 mx-auto row my-2">
        <h2 class="p-2 bgcolor h2btn whitetext" style='cursor: pointer;' onclick="myFunction()">My Playlists &#x25BE;</h2> 

        <div id="playlistsdiv" style="display: none;">
            @foreach($playlists as $playlist)
                <section class="p-2 m-1">
                    <div class="row">
                        <h5 class="col-4 p-0">{{ $playlist->name }}</h5>
                        <a class="col-2 p-1 btn btn-secondary" href="/playlist/playlistname/{{ $playlist->id }}">Change Name</a>
                        <a style="background-color: #f35d6b;" class="col-2 p-1 btn btn-danger" href="/playlist/delete/{{ $playlist->id }}">Delete Playlist</a>
                        <a class="col-2 p-1 btn btn-success" href="/playlist/addsong/{{ $playlist->id }}">Add Song</a>
                    </div>
                    <div>
                        <?php 
                            $totalduration = 0;
                            $totalsongs = 0;
                        ?>
                        
                        @foreach($playlistitems as $item)
                        
                        @if($item->playlistid == $playlist->id)
                            @foreach($songs as $song)
                            @if($item->songid == $song->id)
                            <?php $totalsongs++; ?>
                            <div class="col-12 row my-1 bgcolor whitetext p-2 savedcontainer">
                                <img src="{{$song->img}}" class=" col-1 p-0">
                                <div class="row m-0 p-0 col-11">
                                    <p class="m-0 p-1 col-6">{{ $song->song_name }}</p>
                                    <p class="m-0 p-1 col-6 text-end">{{ $song->genre }}</p>
                                    <p class="m-0 p-1 col-6 fst-italic"> By {{ $song->artist }} </p>
                                    <p class="m-0 p-1 col-6 text-end"><?php $minutes = intdiv($song->duration, 60).':'. ($song->duration % 60); echo $minutes; if (($song->duration % 60) == 0){ echo 0;}?> </p>
                                </div>
                                <div class="row p-0 m-0">
                                    <h6 class="col-6 p-1">{{ $totalsongs }}.</h6>
                                    <a style="background-color: #f35d6b;" class="col-6 p-1 btn btn-danger" href="/playlist/deletesong/{{ $item->id }}">Delete Song</a>
                                </div>
                            </div>
                            <?php 
                                $totalduration = $totalduration+$song->duration;
                            ?>
                            @endif
                            @endforeach
                        @endif

                        @endforeach
                        
                        <h6>Total Playlist Time: <?php $totaltime = intdiv($totalduration, 60).':'. ($totalduration % 60); echo $totaltime; if (($totalduration % 60) == 0){ echo 0;} ?></h6>
                    </div>
                </section>
            @endforeach
        </div>
	</div>
    <script>
        function myFunction() {
            var x = document.getElementById("playlistsdiv");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        } 
    </script>
    @endif

	<div class="col-7 mx-auto row my-2">
		<h2 class="col-8 p-0 subtitle">Make Playlist</h2> 
        <!-- Error message -->
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block col-12 mx-auto">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> {{ $message }} </strong>
        </div>
        @endif
        @if(count($errors) > 0)
            <div class="alert alert-danger col-12 mx-auto">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
	</div>
    <div class="col-7 mx-auto ">
        <form method="post" action="{{ url('/playlist/create') }}">
        {{ csrf_field() }}
            <input class="my-2 inp" type="text" id="playlistname" name="playlistname" value="" placeholder="Playlist name"><br>
            
            <section class="overflow-auto" style="height: 40rem;">
                @foreach($songs as $song)
                        <label class="form-check-label col-12 playlistLabel" for="check{{ $song->id }}">
                            <div class="row my-1 bgcolor mx-1">
                                <img src="{{$song->img}}" class=" col-1 p-0">
                                <div class="col-11">
                                    <div class="row m-0 p-0">
                                        <p class="m-0 p-0 col-6 name">{{ $song->song_name }}</p>
                                        <p class="m-0 p-0 col-6 text-end">{{ $song->genre }}</p>
                                    </div>
                                    <div class="row m-0 p-0">
                                        <p class="m-0 p-0 col-6 fst-italic"> By {{ $song->artist }} </p>
                                        <p class="m-0 p-0 col-6 text-end"><?php $minutes = intdiv($song->duration, 60).':'. ($song->duration % 60); echo $minutes; if (($song->duration % 60) == 0){ echo 0;}?> </p>
                                    </div>
                                    <a class="me-4" href="/song/{{$song->id}}">Link</a>
                                    <input class="form-check-input" type="checkbox" name="{{ $song->id }}" value="{{ $song->id }}" id="check{{ $song->id }}">   
                                </div>
                            </div>
                        </label>
                        
                  
                @endforeach	
            </section>
        <input class="clickelement" type="submit" value="Create">
        </form>
    </div>
    
	
    <link rel="stylesheet" href="{{ asset('/css/playlist.css') }}" />



@endsection