@extends('master')

@section('title', $song->song_name)

@section('content')



	<h3 class="text-center">Song information</h3>

	<div class="col-9 mx-auto border">
			<div class="row  m-2">
				<img src="{{$song->img}}" class=" col-1 w-10 p-0">
				<div class="col-11">
					<p><span>{{ $song->song_name }}</span></p>
					<p><span>{{ $song->artist }}</span></p>
					<a href="/queue/add/{{$song->id}}">Add to queue</a>
				</div>
			</div>
		<p class="m-2"> Date added: {{ $song->created_at->format('d-m-Y') }}</p>
	</div>




@endsection