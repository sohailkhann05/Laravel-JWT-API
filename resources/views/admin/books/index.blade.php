@extends('layouts.admin')
@section('title', 'Books')
@section('css')

    @include('admin.partials.datatables-css')

@endsection
@section('content')

    <?php
        $links = [
            route('books.index') => 'Books'
        ];
    ?>
    @include('admin.partials.breadcrumbs', ['page_title' => 'Books', 'links' => $links])
    @include('admin.partials.response')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="panel-body" style="padding: 0px;">
                    <div class="">
                        <div class="">
                            <a href="{{ route('books.create') }}" class="btn btn-danger waves-effect waves-light mb-5" style=" float: right; background-color: #DB1D4F !important; border-color: #DB1D4F !important;">
                                <i class="ti-plus"></i> Add New Book
                            </a>
                            <table id="datatables" class="table table-striped">
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
        </div>
    </div>
    
    @include('admin.partials.delete-model')

@endsection
@section('script')

    @include('admin.partials.datatables-js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatables').DataTable({
                dom:
                    '<"row"<"col-md-12"<"row datatables-heading"  <"col-md-1"l>  <"col-md-7 text-center"B>  <"col-md-4"f>>>' +
                    '<"col-md-12"tr>' +
                    '<"col-md-12 mt-2"<"row mt-3"  <"col-md-5"i>  <"col-md-7 text-right"p>>> >',
                buttons: {
                    buttons: [{
                        extend: "copy",
                        className: "btn-sm"
                    }, {
                        extend: "csv",
                        className: "btn-sm"
                    }, {
                        extend: "excel",
                        className: "btn-sm"
                    }, {
                        extend: "pdf",
                        className: "btn-sm"
                    }, {
                        extend: "print",
                        className: "btn-sm"
                    }],
                },
                // "order":[[1, 'desc']],//asc or desc
                  columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                  }],        
                "oLanguage": {
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "_MENU_",
                },
                "stripeClasses": [],
                "scrollX": true,
                "lengthMenu": [10, 20, 50, 100],
                "pageLength": 10
            });
        });

        $('.btn-delete').click(function () {
            $('#delete-form').attr('action', '{{ route('books.delete') }}');
            $('#delete_id').val($(this).data('id'));
        });

    </script>

@endsection
