@extends('layouts.admin')
@section('title', 'Change Email')
@section('css')

@endsection
@section('content')

    <?php
        $links = [
            route('change-email.index') => 'Change Email'
        ];
    ?>
    @include('admin.partials.breadcrumbs', ['page_title' => 'Change Email', 'links' => $links])
    @include('admin.partials.response')
    
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Change Email</h4>
                <p class="text-muted m-b-30 font-13">* Required input fields</p>
                <form action="{{ route('change-email.update') }}" method="POST" onsubmit="return loginLoadingBtn(this)"> 
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>New E-Mail</label>
                                <span class="required-field"> *</span>
                                <input type="email" class="form-control @error('new_email') is-invalid @enderror" name="new_email" required>
                                @error('new_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm E-Mail</label>
                                <span class="required-field"> *</span>
                                <input type="email" class="form-control @error('confirm_email') is-invalid @enderror" name="confirm_email" required>
                                @error('confirm_email')
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
                                    Change Email
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection