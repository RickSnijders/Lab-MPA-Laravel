@extends('master')

@section('title', 'Queue')

@section('content')



	<h3 class="text-center">Queue list</h3>

	<div class="col-9 mx-auto border">
    <?php $number = 0 ?>
        @if($queue != null)
        @foreach($queue as $song)
			<?php $number++ ?>
			<li> {{$number}}. <span>{{ $song }}</span></li>
		@endforeach	
        <a href="/queue/clear">Clear queue</a>
        @endif 
        @if($queue == null)
            <p>There are no songs in the queue</p>
        @endif
	</div>
    



@endsection