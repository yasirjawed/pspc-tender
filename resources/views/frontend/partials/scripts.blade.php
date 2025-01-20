<script>
    window.Laravel = {
        successMessage: @json(session('success')),
        errorMessage: @json(session('error')),
    };
</script>
@vite(['resources/js/jquery.js', 'resources/js/bootstrap.js', 'resources/js/custom.js'])
