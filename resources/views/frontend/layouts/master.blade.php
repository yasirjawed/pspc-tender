<!doctype html>
<html>

<head>
    @include('frontend.partials.meta-files')
    @livewireStyles
    @include('frontend.partials.head')
    @stack('custom-css')
</head>

<body>
    @include('frontend.partials.header')
    <main>
        @yield('content')
    </main>
    @include('frontend.partials.footer')
    @livewireScripts
    @include('frontend.partials.scripts')
    @stack('custom-js')
</body>

</html>
