@extends('layouts.login')
@section('content')
 <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                  @csrf
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                 {{--  <input type="text" class="form-control" placeholder="Username"> --}}
                 <input id="email" type="email" placeholder="john@mius.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                  <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="row">
                  <div class="col-6">
                    {{-- <button type="button" class="btn btn-primary px-4">Login</button> --}}
                    <button type="submit" class="btn btn-primary px-4">
                                    {{ __('Login') }}
                                </button>
                  </div>
                  <div class="col-6 text-right">
                    {{-- <button type="button" class="btn btn-link px-0">Forgot password?</button> --}}
                    <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection