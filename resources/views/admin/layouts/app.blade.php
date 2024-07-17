<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Wasim Shakir">
    <meta name="robots" content="noindex, nofollow">

    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="{{ asset('admin_assets/js/jquery-3.6.0.min.js') }}"></script>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin_assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('admin_assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin_assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}">

    {{-- @if (in_array(Route::currentRouteName(), ['create.product']))
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/select2/css/select2.min.css') }}">
    @endif --}}

</head>
<body>

    <div class="main-wrapper">

        @if (!in_array(Route::currentRouteName(), ['admin.login', 'admin.signup']))
            @include('admin.layouts.header')
            @include('admin.layouts.sidebar')
        @endif

        @yield('section')

    </div>

@include('admin.layouts.footer')
