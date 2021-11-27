<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      @yield('description')
      {{-- <meta name="description" content=""> --}}
      <meta name="author" content="">
      <link rel="icon" type="image/png" href="{{ asset('getThrills/img/logo-icon.png') }}">
      <title>getThrills - @yield('title')</title>
       <!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="{{ asset('getThrills/vendor/slick/slick.min.css') }}"/>
      <link rel="stylesheet" type="text/css" href="{{ asset('getThrills/vendor/slick/slick-theme.min.css') }}"/>
      <!-- Custom fonts for this template-->
      <link href="{{ asset('getThrills/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="{{ asset('getThrills/css/osahan.min.css') }}" rel="stylesheet">

      <!--Custom CSS-->
      <link href="{{ asset('getThrills/css/custom.css') }}" rel="stylesheet">

      @yield('CSS')
   </head>
   <body id="page-top">
       @yield('bottom_nav')
   @include('layouts.user_layouts.inc.message')
