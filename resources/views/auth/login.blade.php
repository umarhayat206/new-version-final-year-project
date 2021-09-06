@extends('layouts.app')
<style>
        .login-div1 {
            margin-top:-50px;
            	/* background: rgb(219,226,226); */
                /* padding-bottom:30px; */
                /* padding-top:40px; */
               
                
            }
     .img
            {
            	border-top-left-radius:30px;
            	border-bottom-left-radius:30px;
            }
            .login-div2
            {
            	background:white;
            	border-radius:30px;
                
            }
            
            .btn1
            {
            	border:none;
            	outline: none;
            	height: 50px;
            	width:100%;
            	background:#343a40 !important;
            	border-radius:4px;
            	color:white;
            }
            .h1{
                font-family: poppins;
    color: #343a40 !important;
    font-weight: bold;
            }
</style>
@section('content')
<div class="jumbotron login-div1">
<div class="my-4 mx-5">
<div class="container">
    <div class="row login-div2 no-gutters">
        <div class="col-lg-5">
            <img src="login.jpg" width="100%" height="550:px" class="img">
        </div> 
        <div class="col-lg-7 px-5 pt-5">
            <h1 class="font-weight-bold py-3 h1">E-VOTE</h1>
            <h4>Sign into your account</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-lg-8">
                                <input id="email" type="email" class="form-control my-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-lg-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-lg-8">
                                <button type="submit" class="btn1">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                
           
        </div>
    </div>
</div>
</div>
</div>
@endsection
