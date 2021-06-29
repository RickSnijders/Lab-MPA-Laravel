@extends('master')

@section('title', 'Queue')

@section('content')



	<h3 class="text-center">Queue list</h3>

	<div class="col-9 mx-auto border">
    <?php $number = 0 ?>
        @if($queue != null)
        @foreach($queue as $song)
			<?php $number++ ?>
			<div class="row border m-2 bg-light">
				<img src="{{$song->img}}" class=" col-1 w-10 p-0">
				<div class="col-11">
					<p> {{$number}}. <span>{{ $song->song_name }}</span></p>
					<p> {{$song->artist}}</p>
					<a href="/song/{{$song->id}}">Link</a>
				</div>
			</div>
		@endforeach	
        <a href="/queue/clear">Clear queue</a>
        @endif 
        @if($queue == null)
            <p>There are no songs in the queue</p>
        @endif
	</div>
    



@endsection