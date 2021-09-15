@extends('layouts.admin')
@section('title', 'Book Details')
@section('css')

@endsection
@section('content')

    <?php
        $links = [
            route('books.index') => 'Books',
            route('books.show', base64_encode($book->id)) => 'Book Details'
        ];
    ?>
    @include('admin.partials.breadcrumbs', ['page_title' => '', 'links' => $links])

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">
                    Book Details
                    <button type="button" data-id="{{ base64_encode($book->id) }}" style="float: right;" data-toggle="modal" data-target="#delete-modal" class="btn btn-delete btn-sm btn-danger btn-custom btn-rounded waves-effect waves-light">
                        <i class="ti-trash"></i> Delete
                    </button>
                    <a href="{{ route('books.edit', base64_encode($book->id)) }}" style="float: right; margin-right: 5px;" class="btn btn-sm btn-primary btn-custom btn-rounded waves-effect waves-light">
                        Update Details
                    </a>
                </h4>
                <hr>
                <p class="text-muted m-b-30 font-13"></p>

                <div class="row mb-3 text-center">
                    <div class="col-md-12">
                        <div class="form-group">
                            @php
                                $cover = ($book->attachment != null) ? $book->attachment->attachment : 'cover.png'
                            @endphp
                            <img src="{{ asset('uploads/' . $cover)  }}" class="img-responsive">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Book</label>
                            <h5>{{ $book->title }}</h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Author</label>
                            <h5>{{ $book->author }}</h5>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ISBN</label>
                            <h5>{{ $book->isbn }}</h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Created</label>
                            <h5>{{ $book->created_at }}</h5>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <h5>{{ $book->description }}</h5>
                        </div>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>

    @include('admin.partials.delete-model')

@endsection
@section('script')

    <script>

        $('.btn-delete').click(function () {
            $('#delete-form').attr('action', '{{ route('books.delete') }}');
            $('#delete_id').val($(this).data('id'));
        });

    </script>

@endsection