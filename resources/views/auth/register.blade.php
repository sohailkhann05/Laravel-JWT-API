@extends('layouts.app')
@section('title', 'Register')
@section('content')

    @include('admin.partials.response')
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center"> Create New <strong class="text-custom">{{ env('APP_NAME') }}</strong> Account</h3>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('register') }}" onsubmit="return loginLoadingBtn(this)">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-pink btn-block text-uppercase waves-effect waves-light btn-loading">
                        {{ __('Register') }}
                    </button>
                </div>
                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <p class="text-center">
                            Already have account? <a href="{{ route('login') }}">Login Now?</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
