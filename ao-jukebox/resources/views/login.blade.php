@extends('master')

@section('title', 'Home')

@section('content')



	<h1 class="text-center subtitle">Login</h1>
    @if(isset(Auth::user()->email))
        <script>    
                alert("Already logged in");
                window.location="/";
        </script>
    @endif
    <div class="col-3 mx-auto p-5 bgcolor">
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
        <form  method="post" action="{{ url('/login/checklogin') }}">
            {{ csrf_field() }}
            <div >
                <div class="form-group">
                    <label class="whitetext">Enter Email</label>
                    <input type="email" name="email" class="form-control logininput" placeholder="example@gmail.com" />
                </div>
                <div class="form-group">
                    <label class="whitetext">Enter Password</label>
                    <input type="password" name="password" class="form-control logininput" placeholder="password" />
                </div>
                <div class="form-group mt-1 flex between">
                    <input type="submit" name="login" class="clickelement" value="Login" />
                    <a class="clickelement" href="/register" >Register</a>
                </div>
            </div>
        </form>
       
    </div>

    <link rel="stylesheet" href="{{ asset('/css/login.css') }}" />
@endsection