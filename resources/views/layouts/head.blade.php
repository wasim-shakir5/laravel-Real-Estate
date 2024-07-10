<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- imported links --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="{{ asset('asset_fo/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/fl-bigmug-line.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
 