<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('assets/images/fav-icon.png') }}">
    <title>@yield('title', 'Home') | {{ env('APP_NAME') }}</title>

    <!-- CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    @yield('css')
    <style>
        .invalid-feedback, .required-field {color: #f05050;}
        .is-invalid {border-color: #f05050 !important;}
        .mb-3 {margin-bottom: 13px;}
        .mb-5 {margin-bottom: 20px;}
        .custom-made-btn {padding: 5px; color: #444; font-size: 17px;}
        th {white-space: nowrap;}
        .table>tbody>tr>td {vertical-align: middle !important;}
    </style>

</head>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            @include('admin.partials.logo')

            <!-- Top Bar -->
            @include('admin.partials.topbar')

        </div>

        <!-- Left Sidebar -->
        @include('admin.partials.sidebar')

        <!-- Content -->
        <div class="content-page">
            <div class="content">
                <div class="container">
                    @yield('content')
                </div>
                <footer class="footer text-right">
                    {{ env('APP_NAME') }} © {{ date('Y') }}. All rights reserved.
                </footer>
            </div>
        </div>

    </div>

    <!-- jQuery  -->
    <script>
        var resizefunc = [];
    </script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
    @yield('script')
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>
    <script>
        function loginLoadingBtn() {
            $('.btn-loading').prop('disabled', true);
            return true;
        }
    </script>
</body>
</html>
