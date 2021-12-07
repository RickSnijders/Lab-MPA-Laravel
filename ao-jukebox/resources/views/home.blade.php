@extends('master')

@section('title', 'Home')

@section('content')
	<?php $selectedGenre = 'All' ?>
	@if (isset($genreSelected))
	<?php $selectedGenre = $genreSelected ?>

	@endif
	<div class="col-6 mx-auto row my-4">
		<h2 class="col-8 p-0 test">Song List</h2> 
		<form class="col-4 m-0 p-1 row" method="post" action="{{ url('/genre') }}">
		{{ csrf_field() }}
			<select class="col-8 p-2 bgcolor" name="genrelist" id="genrelist">
				<option <?php if ($selectedGenre == 'All'){ echo 'selected';} ?> value="All">All</option>
				@foreach($genres as $item)
				<option <?php if ($selectedGenre == $item->genre){ echo 'selected';} ?> value="{{$item->genre}}">{{$item->genre}}</option>
				@endforeach
			</select>
			<input class="col-4 smbtn" type="submit" value="submit">
		</form>
	</div>

	<ul class="col-6 mx-auto p-0">
		<?php $number = 0 ?>
		@foreach($songs as $song)
			@if ($selectedGenre == 'All')
				<?php $number++ ?>
				<div class="row bgcolor homeItm">
					<img src="{{$song->img}}" class=" col-1 p-0">
					<div class="col-11">
						<div class="row m-0 p-0">
							<p class="m-0 p-0 col-6"> {{$number}}. <span>{{ $song->song_name }}</span></p>
							<p class="m-0 p-0 col-6 text-end">{{ $song->genre }}</p>
						</div>
						<div class="row m-0 p-0">
							<p class="m-0 p-0 col-6 fst-italic"> By {{ $song->artist }} </p>
							<p class="m-0 p-0 col-6 text-end"><?php $minutes = intdiv($song->duration, 60).':'. ($song->duration % 60 ); echo $minutes; if (($song->duration % 60) == 0){ echo 0;}?> </p>
						</div>
						<a href="/song/{{$song->id}}">Link</a>
						<a href="/queue/add/{{$song->id}}">Add to queue</a>
					</div>
				</div>
			@elseif ($selectedGenre == $song->genre)
				<?php $number++ ?>
				<div class="row bgcolor homeItm">
					<img src="{{$song->img}}" class=" col-1 p-0">
					<div class="col-11">
						<div class="row m-0 p-0">
							<p class="m-0 p-0 col-6"> {{$number}}. <span>{{ $song->song_name }}</span></p>
							<p class="m-0 p-0 col-6 text-end">{{ $song->genre }}</p>
						</div>
						<div class="row m-0 p-0">
							<p class="m-0 p-0 col-6 fst-italic"> By {{ $song->artist }} </p>
							<p class="m-0 p-0 col-6 text-end"><?php $minutes = intdiv($song->duration, 60).':'. ($song->duration % 60); echo $minutes; if (($song->duration % 60) == 0){ echo 0;}?> </p>
						</div>
						<a href="/song/{{$song->id}}">Link</a>
						<a href="/queue/add/{{$song->id}}">Add to queue</a>
					</div>
				</div>
			@endif
		@endforeach	
	</ul>

	<link rel="stylesheet" href="{{ asset('/css/home.css') }}" />

@endsection