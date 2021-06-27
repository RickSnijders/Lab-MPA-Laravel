@extends('master')

@section('title', 'Home')

@section('content')



	<h3 class="text-center">Song List</h3>

	<ul class="col-9 mx-auto border">
		<?php $number = 0 ?>
		@foreach($songs as $song)
			<?php $number++ ?>
			<li> {{$number}}. <span>{{ $song->song_name }}</span></li>
			<a href="/song/{{$song->id}}">Link</a>
			<a href="/queue/add/{{$song->id}}">Add to queue</a>
		@endforeach	
	</ul>




@endsection