@extends('master')

@section('title', 'Home')

@section('content')
	<?php $selectedGenre = 'All' ?>
	@if (isset($genreSelected))
	<?php $selectedGenre = $genreSelected ?>
    
	@endif

    
	<div class="col-7 mx-auto row my-2">
		<h2 class="col-8 p-0">Make Playlist</h2> 
		
	</div>
    <div class="col-7 mx-auto ">
        <form method="post" action="{{ url('/playlist/create') }}">
        {{ csrf_field() }}
            <input type="text" id="playlistname" name="playlistname" value="" placeholder="Playlist name"><br>
            
            <section class="overflow-auto" style="height: 40rem;">
                @foreach($songs as $song)
                        <label class="form-check-label col-12" for="check{{ $song->id }}">
                            <div class="row border my-2 bg-light mx-1">
                                <img src="{{$song->img}}" class=" col-1 p-0">
                                <div class="col-11">
                                    <div class="row m-0 p-0">
                                        <p class="m-0 p-0 col-6">{{ $song->song_name }}</p>
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
        <input class="m-2 p-2" type="submit" value="Create">
        </form>
    </div>
    
	




@endsection