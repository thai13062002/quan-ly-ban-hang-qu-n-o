<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Amaisoft" name="author"/>

    @yield('admin_head')

    <base href="{{ asset('') }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="admin-assets/images/favicon.ico">

    @include('admin.includes.style')

</head>

@yield('admin_main')

</html>
