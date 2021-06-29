@extends('master')

@section('title', $song->song_name)

@section('content')



	<h3 class="text-center">Song information</h3>

	<div class="col-9 mx-auto border">
			<div class="row  m-2">
				<img src="{{$song->img}}" class=" col-1 w-10 p-0">
				<div class="col-11">
					<div class="row m-0 p-0">
						<p class="m-0 p-0 col-6">{{ $song->song_name }}</p>
						<p class="m-0 p-0 col-6 text-end">{{ $song->genre }}</p>
					</div>
					<div class="row m-0 p-0">
						<p class="m-0 p-0 col-6"> By {{ $song->artist }} </p>
						<p class="m-0 p-0 col-6 text-end"><?php $minutes = intdiv($song->duration, 60).':'. ($song->duration % 60); echo $minutes; if (($song->duration % 60) == 0){ echo 0;}?> </p>
					</div>
					<a href="/queue/add/{{$song->id}}">Add to queue</a>
				</div>
			</div>
		<p class="m-2"> Date added: {{ $song->created_at->format('d-m-Y') }}</p>
	</div>




@endsection