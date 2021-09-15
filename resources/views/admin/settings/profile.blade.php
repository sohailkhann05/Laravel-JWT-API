@extends('layouts.admin')
@section('title', 'Profile Settings')
@section('css')

@endsection
@section('content')

    <?php
        $links = [
            route('profile-settings.index') => 'Profile Settingse'
        ];
    ?>
    @include('admin.partials.breadcrumbs', ['page_title' => 'Profile Settings', 'links' => $links])
    @include('admin.partials.response')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Profile Settings</h4>
                <p class="text-muted m-b-30 font-13">* Required input fields</p>
                <form action="{{ route('profile-settings.update') }}" method="POST" onsubmit="return loginLoadingBtn(this)" enctype="multipart/form-data"> 
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <span class="required-field"> *</span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <span class="required-field"> *</span>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required>
                                @error('phone')
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
                                <label>Job Title</label>
                                <span class="required-field"> *</span>
                                <input type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ $user->job_title }}" required>
                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Profile Picture</label>
                                <span class="required-field"></span>
                                <input type="file" class="form-control filestyle @error('attachment') is-invalid @enderror" data-icon="false" data-buttonname="btn-white" name="attachment">
                                @error('attachment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <span class="required-field"> *</span>
                                <textarea rows="3" class="form-control @error('address') is-invalid @enderror" name="address" required>{{ $user->address }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-loading btn-custom btn-rounded waves-effect waves-light">
                                    Update Profile Settings
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script src="{{ asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>

@endsection