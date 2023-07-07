@extends('layouts.auth')

@section('content')
	
	<style>
        body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;}

        input[type=text], input[type=password] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
        }

        button {
          background-color: #04AA6D;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
        }

        button:hover {
          opacity: 0.8;
        }

        .cancelbtn {
          width: auto;
          padding: 10px 18px;
          background-color: #f44336;
        }

        .imgcontainer {
          text-align: center;
          margin: 24px 0 12px 0;
        }

        img.avatar {
          width: 40%;
          border-radius: 50%;
        }

        .container {
          padding: 16px;
        }

        span.psw {
          float: right;
          padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
          span.psw {
             display: block;
             float: none;
          }
          .cancelbtn {
             width: 100%;
          }
        }
    </style>

    <form method="post" action="{{ route('register.perform') }}">
    	<div class="container">
	        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
	        <h1 class="h3 mb-3 fw-normal">Register</h1>

	        <div class="form-group form-floating mb-3">
	            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="John" required="required" autofocus>
	            <label for="floatingEmail">Name</label>
	            @if ($errors->has('name'))
	                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
	            @endif
	        </div>

	        <div class="form-group form-floating mb-3">
	            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
	            <label for="floatingEmail">Email address</label>
	            @if ($errors->has('email'))
	                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
	            @endif
	        </div>

          <!--
	        <div class="form-group form-floating mb-3">
	            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
	            <label for="floatingName">Username</label>
	            @if ($errors->has('username'))
	                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
	            @endif
	        </div>
          -->
	        
	        <div class="form-group form-floating mb-3">
	            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
	            <label for="floatingPassword">Password</label>
	            @if ($errors->has('password'))
	                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
	            @endif
	        </div>

	        <div class="form-group form-floating mb-3">
	            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
	            <label for="floatingConfirmPassword">Confirm Password</label>
	            @if ($errors->has('password_confirmation'))
	                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
	            @endif
	        </div>

	        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
          <a href="{{url('login')}}">Login</a>
    	</div>
    </form>
@endsection