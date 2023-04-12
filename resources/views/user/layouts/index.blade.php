<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Amaisoft" name="author"/>

    @yield('user_head')

    <base href="{{ asset('') }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="admin-assets\images\logo.svg">

    @include('user.includes.style')
    @include('user.includes.script')

</head>

@yield('user_main')

</html>
