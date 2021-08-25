@extends('master')

@section('title', 'Home')

@section('content')

	<div class="col-7 mx-auto row my-2">
		<h2 class="col-8 p-0">Playlist Name</h2> 
		
	</div>
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block col-7 mx-auto">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> {{ $message }} </strong>
        </div>
    @endif
    @if(count($errors) > 0)
        <div class="alert alert-danger col-7 mx-auto">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <div class="col-7 mx-auto ">
        <form method="post" action="{{ url('/playlist/newname') }}">
        {{ csrf_field() }}
            <input type="text" id="playlistname" name="playlistname" value="{{ $name[0]->name }}" placeholder="Playlist name"><br>
            <input type="hidden" id="playlistid" name="playlistid" value="{{ $playlistid }}"><br>
        <input class="m-2 p-2" type="submit" value="Change">
        </form>
    </div>
    
	




@endsection