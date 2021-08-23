@extends('master')

@section('title', 'Queue')

@section('content')



	<h3 class="text-center">Queue list</h3>

	<div class="col-9 mx-auto border">
    <?php $number = 0 ?>
    <?php $queueDuration = 0 ?>
        @if($queue != null)
        @foreach($queue as $key => $song)
			<?php $queueDuration = $queueDuration+$song->duration ?>
			<?php $number++ ?>
			<div class="row border m-2 bg-light">
				<img src="{{$song->img}}" class=" col-1 w-10 p-0">
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
					<a href="/queue/delete/{{$key}}">Remove from queue</a>
				</div>
			</div>
		@endforeach	
			<div class="row m-0 p-0">
				<a class="col-3" href="/queue/clear">Clear queue</a>
				<a class="col-3" href="/playlist/save">Save as playlist</a>
				<p class=" col-6 text-end">Queue duration: <?php $minutes = intdiv($queueDuration, 60).':'. ($queueDuration % 60); echo $minutes; if (($queueDuration % 60) == 0){ echo 0;} ?></p>
			</div>
		@endif 
        @if($queue == null)
            <p>There are no songs in the queue</p>
        @endif
	</div>
    



@endsection