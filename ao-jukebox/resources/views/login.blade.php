@extends('master')

@section('title', 'Home')

@section('content')



	<h1 class="text-center">Login</h1>
    @if(isset(Auth::user()->email))
        <script>    
                alert("Already logged in");
                window.location="/";
        </script>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong> {{ $message }} </strong>
    </div>
    @endif

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif
	<form method="post" action="{{ url('/login/checklogin') }}">
        {{ csrf_field() }}
        <div class="col-3 mx-auto border p-5 bg-light">
            <div class="form-group">
                <label>Enter Email</label>
                <input type="email" name="email" class="form-control" placeholder="example@gmail.com"/>
            </div>
            <div class="form-group">
                <label>Enter Password</label>
                <input type="password" name="password" class="form-control" placeholder="password" />
            </div>
            <div class="form-group mt-1">
                <input type="submit" name="login" class="btn btn-primary" value="Login" />
            </div>
        </div>
   </form>


@endsection