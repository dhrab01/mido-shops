<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Mido Shops - Admin  Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Multi vendor e-Commerce marketblace" name="description" />
    <meta content="Mohammed Aldhrab" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/backend/images/favicon.ico') }}">
    @include('admin.layouts.head-css')
</head>

@section('body')
    @include('admin.layouts.body')
@show

    <!-- Begin page -->
    <div id="layout-wrapper">
 <body data-layout="horizontal">

        @include('admin.layouts.horizontal')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <!-- Start content -->
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- content -->
            </div>
            @include('admin.layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    @include('admin.layouts.right-sidebar')
    <!-- END Right Sidebar -->

    @include('admin.layouts.vendor-scripts')
</body>

</html>
