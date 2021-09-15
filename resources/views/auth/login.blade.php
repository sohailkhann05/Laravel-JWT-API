@extends('layouts.app')
@section('title', 'Login')
@section('content')

    @include('admin.partials.response')
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center"> Sign In to <strong class="text-custom">{{ env('APP_NAME') }}</strong> </h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group ">
                    <div class="col-xs-12">
                        <label>{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label>{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="checkbox-signup">
                                Remember me
                            </label>
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="#" class="text-dark">
                            <i class="fa fa-lock m-r-5"></i> Forgot your password?
                        </a>
                        <hr>
                        <p class="text-center">
                            New to {{ env('APP_NAME') }} ? <a href="{{ route('register') }}">Create account?</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection