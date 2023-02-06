<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Mido Shops - Admin Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Multi vendor e-Commerce marketblace" name="description" />
    <meta content="Mohammed Aldhrab" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/backend/images/favicon.ico')}}">
    @include('admin.layouts.head-css')
</head>

@yield('body')

@yield('content')

@include('admin.layouts.vendor-scripts')
</body>

</html>