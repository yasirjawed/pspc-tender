<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Pakistan Security Printing Corporation</title>
    <link rel="icon" href="{{ asset('frontend/assets/img/pspc-logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="PSPC">
    <meta name="author" content="PSPC">
    <meta name="description" content="Pakistan Security Printing Corporation">
    <meta name="keywords" content="Pakistan Security Printing Corporation">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('frontend.partials.head')
    @stack('custom-css')
</head>

<body>
    @include('frontend.partials.header')
    <main>
        @yield('content')
    </main>
    @include('frontend.partials.footer')
    @include('frontend.partials.scripts')
    @stack('custom-js')
</body>

</html>
