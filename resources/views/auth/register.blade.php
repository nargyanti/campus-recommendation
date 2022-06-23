{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="{{ asset("css/style.css")}}">
      <title>Score</title>
    </head>
    <body style="background: linear-gradient(120deg, #ffff, #FDE047);">
        <div class="container">
            <nav>
              <div class="nav-brand">
                <img src="assets/icon/Score..svg" alt="">
              </div>
              <div class="nav-links">
                <a href="#" class="link-sm">About</a>
                <button hrfef="#" class="btn-primary">Lets Start</button>
              </div>
            </nav>

            <!--register card-->
            <div class="center">
                <h1>Register</h1>
                <form method="post">
                  <div class="txt_field">
                    <input type="text" required>
                    <span></span>
                    <label>Username</label>
                  </div>
                  <div class="txt_field">
                    <input type="email" required>
                    <span></span>
                    <label>E-mail</label>
                  </div>
                  <div class="txt_field">
                    <input type="password" required>
                    <span></span>
                    <label>Password</label>
                  </div>
                  <div class="txt_field">
                    <input type="password" required>
                    <span></span>
                    <label>Confirm Password</label>
                  </div>
                  <input type="submit" value="Register">
                  <div class="signup_link"><a href="#"> </a>
                  </div>
                </form>
              </div>
    </body>
</html>