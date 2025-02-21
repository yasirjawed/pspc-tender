<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Pakistan Security Printing Corporation') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('backend/assets/img/pspc-logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Pakistan Security Printing Corporation">
    <meta name="author" content="Pakistan Security Printing Corporation">
    <meta name="description"
        content="Official website of Pakistan Security Printing Corporation, ensuring high-security document printing solutions.">

    @include('frontend.vendor.partials.head')
    @stack('specific_css')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('frontend.vendor.partials.header')
        @include('frontend.vendor.partials.sidebar')
        <main class="app-main">
            @yield('content')
        </main>
        @include('frontend.vendor.partials.footer')
    </div>

    @include('frontend.vendor.partials.scripts')
    @stack('specific_js')
</body>

</html>
