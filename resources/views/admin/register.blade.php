@extends('layouts.app')

@section('stylesheets')
<!-- STYLE CSS -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="{{ asset('registration/css/style.css') }}">
@endsection

@section('content')
<br><br>
		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="{{asset('images/registration-form-4.jpg')}}" alt="" style="height:490px">
                </div>
                                <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                    <h3>Sign Up</h3>
                                    <div class="form-holder active">
                                        <input type="text" id="name" placeholder="{{ __('Name') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                       @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                       @enderror
                                    </div>
                                    <div class="form-holder">
                                        <input  id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-holder">
                                            <input  id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-holder">
                                            <input  id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>


                                    <div class="form-login">
                                            <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                            </button>
                                        <p style="font-size:12px">Already Have account? <a href="{{url('login')}}">Login</a></p>
                                    </div>

                          </form>

			</div>
		</div>

@endsection

@section('javascripts')
        <script src="{{ asset('registration/js/jquery-3.3.1.min.js') }}"></script>
		<script src="{{ asset('registration/js/main.js') }}"></script>
@endsection
