<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Pakistan Security Printing Corporation</title>
    <link rel="icon" href="{{ asset('backend/assets/img/pspc-logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="PSPC">
    <meta name="author" content="PSPC">
    <meta name="description" content="Pakistan Security Printing Corporation">
    <meta name="keywords" content="Pakistan Security Printing Corporation">
    @include('backend.partials.head')
    @stack('specific_css')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('backend.partials.header')
        @include('backend.partials.sidebar')
        <main class="app-main">
            @yield('content')
        </main>
        @include('backend.partials.footer')
    </div>
    @include('backend.partials.scripts')
    @stack('specific_js')
</body>

</html>
