@extends('layouts.admin')
@section('title', 'Update Book Details')
@section('css')

@endsection
@section('content')

    <?php
        $links = [
            route('books.index') => 'Books',
            route('books.edit', base64_encode($book->id)) => 'Update Book Details'
        ];
    ?>
    @include('admin.partials.breadcrumbs', ['page_title' => 'Update Book', 'links' => $links])

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Update Book</h4>
                <p class="text-muted m-b-30 font-13">* Required input fields</p>
                <form action="{{ route('books.update') }}" method="POST" onsubmit="return loginLoadingBtn(this)" enctype="multipart/form-data"> 
                    @csrf
                    <input type="hidden" name="id" value="{{ base64_encode($book->id) }}">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Book Title</label>
                                <span class="required-field"> *</span>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $book->title }}" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Author</label>
                                <span class="required-field"> *</span>
                                <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ $book->author }}" required>
                                @error('author')
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
                                <label>ISBN</label>
                                <span class="required-field"> *</span>
                                <input type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" value="{{ $book->isbn }}" required>
                                @error('isbn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Book Cover</label>
                                <input type="file" class="form-control" name="attachment">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <span class="required-field"> *</span>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="6" required>{{ $book->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-loading btn-custom btn-rounded waves-effect waves-light">
                                    Update Brand Details
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection