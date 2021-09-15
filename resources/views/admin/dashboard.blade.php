@extends('layouts.admin')
@section('title', 'Dashboard')
@section('css')


@endsection
@section('content')

    <?php
        $links = [];
    ?>
    @include('admin.partials.breadcrumbs', ['page_title' => 'Dashboard', 'links' => $links])
    @include('admin.partials.response')

    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="text-dark header-title m-t-0">Lastest Books</h4>
                <div class="table-responsive">
                    <table class="table table-actions-bar m-b-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Book</th>
                                <th>Author</th>
                                <th>ISBN</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->isbn }}</td>
                                    <td>
                                        <a href="{{ route('books.show', base64_encode($book->id)) }}" class="custom-made-btn" title="View Details">
                                            <i class="ti-eye"></i>
                                        </a>
                                        <a href="{{ route('books.edit', base64_encode($book->id)) }}" class="custom-made-btn" title="Update Details">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a href="javascript::void();" data-id="{{ base64_encode($book->id) }}" data-toggle="modal" data-target="#delete-modal" class="btn-delete custom-made-btn" title="Delete">
                                            <i class="ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        No book record found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')


@endsection

