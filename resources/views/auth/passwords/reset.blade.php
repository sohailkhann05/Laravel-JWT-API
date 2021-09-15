@extends('layouts.app')
@section('title', 'Reset Password')
@section('content')

    <style type="text/css">
        .mb-3 {margin-bottom: 15px;}
    </style>
    @include('admin.partials.response')
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center"> Reset Password <strong class="text-custom">{{ env('APP_NAME') }}</strong> </h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}">

                <div class="form-group mb-3">
                    <div class="col-xs-12">
                        <label>{{ __('Password') }}</label>
                        <span style="color: red;"> *</span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <div class="col-xs-12">
                        <label>{{ __('Confirm Password') }}</label>
                        <span style="color: red;"> *</span>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Reset Password</button>
                    </div>
                </div>

            </form>
            
        </div>
    </div>

@endsection