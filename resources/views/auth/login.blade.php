@extends('layouts.app')

@section('stylesheets')
<!-- STYLE CSS -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="{{ asset('registration/css/style.css') }}">
@endsection

@section('content')
<br><br>
		<div class="wrapper">
			<div class="inner" >
				<div class="image-holder">
					<img src="{{asset('images/registration-form-4.jpg')}}" alt="" style="height:490px;width:300px">
                </div>
                                <form method="POST" action="{{ route('login') }}" style="width:550px">
                                        @csrf

                                    <h3>Se connecter</h3>
                                    <div class="form-holder active">
                                        <input type="email" id="email" placeholder="{{ __('Adresse E-Mail') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-holder">
                                        <input  id="password" type="password" placeholder="{{ __('Mot de passe') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Sauvegarder Moi') }}
                                            </label>
                                    </div>
<br><br>


                                    <div class="form-login">
                                            <button  type="submit" class="btn btn-primary" style="width:200px; font-size:11px">
                                                    {{ __('Se connecter') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link" style="padding-left:10px;font-size: 10px;color:#4cc9f0;" href="{{ route('password.request') }}">
                                                {{ __('Le mot de passe oublié ?') }}
                                            </a>
                                        @endif
                                    </div>


                          </form>

			</div>
		</div>

@endsection

@section('javascripts')
        <script src="{{ asset('registration/js/jquery-3.3.1.min.js') }}"></script>
		<script src="{{ asset('registration/js/main.js') }}"></script>
@endsection
