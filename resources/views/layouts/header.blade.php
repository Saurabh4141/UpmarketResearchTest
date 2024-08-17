<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ asset('backend/custom/images/logo.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <link href="{{ asset('backend/template/css/light.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/template/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/template/css/toastr.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/custom/css/custom.css')}}" rel="stylesheet">
    @yield('post_css')
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="wrapper">
        <div id="loader" class="d-none">
            <img id="loading-image" src="{{ asset('backend/custom/images/loading.gif') }}" />
        </div>
        <div class="main">