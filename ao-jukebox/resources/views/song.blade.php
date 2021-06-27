@extends('master')

@section('title', $song->song_name)

@section('content')



	<h3 class="text-center">Song information</h3>

	<div class="col-9 mx-auto border">
		
		<p> Song name: {{ $song->song_name }}</p>
		<p> Date added: {{ $song->created_at->format('d-m-Y') }}</p>
		<a href="/">Home</a>
	</div>




@endsection