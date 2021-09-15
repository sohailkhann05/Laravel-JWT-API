@extends('layouts.app')
@section('title', 'Reset Password')
@section('content')

    @include('admin.partials.response')
    <div class=" card-box">
        <div class="panel-heading text-center">
            <h3> Reset Password <strong class="text-custom">{{ env('APP_NAME') }}</strong></h3>
            <p>
                Password reset link will be send to your email
            </p>
        </div>

        <div class="panel-body">
            <form method="post" action="{{ route('password.email') }}" role="form" method="POST">
                @csrf
                <div class="form-group m-b-0">
                    <div class="form-group">
                        <label>E-Mail address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-pink w-sm waves-effect waves-light">
                            {{ __('Send Password Reset Link') }}
                        </button> 
                    </div>
                </div>
                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="{{ route('login') }}" class="text-dark"><i class="fa fa-user m-r-5"></i> Login to your account</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection