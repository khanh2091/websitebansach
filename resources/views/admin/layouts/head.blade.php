<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- Primary Meta Tags -->
  {{-- <title>@yield('title')</title> --}}
  <title>Quản lý sách</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Nguyễn Quốc Khánh">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}">
  <link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <!-- Font Awesome -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('vendor/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Sweet Alert -->
  <link type="text/css" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

  <!-- Notyf -->
  <link type="text/css" href="{{ asset('vendor/notyf/notyf.min.css') }}" rel="stylesheet">

  <!-- Notyf -->
  <link type="text/css" href="{{ asset('vendor/choices/choices.min.css') }}" rel="stylesheet">

  <!-- Volt CSS -->
  <link type="text/css" href="{{ asset('css/volt.css') }}" rel="stylesheet">

  @stack('styles')

</head>