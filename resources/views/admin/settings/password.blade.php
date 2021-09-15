@extends('layouts.admin')
@section('title', 'Change Password')
@section('css')

@endsection
@section('content')

    <?php
        $links = [
            route('change-password.index') => 'Change Password'
        ];
    ?>
    @include('admin.partials.breadcrumbs', ['page_title' => 'Change Password', 'links' => $links])
    @include('admin.partials.response')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Change Password</h4>
                <p class="text-muted m-b-30 font-13">* Required input fields</p>
                <form action="{{ route('change-password.update') }}" method="POST" onsubmit="return loginLoadingBtn(this)"> 
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Old Password</label>
                                <span class="required-field"> *</span>
                                <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required>
                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>New Password</label>
                                <span class="required-field"> *</span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <span class="required-field"> *</span>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-loading btn-custom btn-rounded waves-effect waves-light">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
