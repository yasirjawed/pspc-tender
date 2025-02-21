<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/datepicker.js') }}"></script>
<script src="{{ asset('assets/js/fileinput.min.js') }}"></script>
<script src="{{ asset('assets/js/flatpickr.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    function ErrorValidations(xhr) {
        let errors = xhr.responseJSON.errors;
        let errorMessages = "";
        let i = 1;
        for (const key in errors) {
            errorMessages += i + "- " + errors[key].join("<br>") + "<br>";
            i++;
        }
        return errorMessages;
    }

    function FormError(msg) {
        Swal.fire({
            icon: "error",
            title: "Errors",
            html: msg,
            willClose: () => {
                // $('html, body').animate({
                //     scrollTop: 0
                // }, 'slow');
            },
        });
    }

    function ShowSuccess(msg) {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
        });
        Toast.fire({
            icon: "success",
            title: msg,
        });
    }

    function ShowError(msg) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            title: msg,
            toast: true, // This enables the toast mode
            position: "top-end", // Position of the toast
            showConfirmButton: false, // Hides the confirm button
            timer: 3000, // Time to show the toast in milliseconds
        });
    }
    $(document).ready(function() {
        var success = "{{ session('success') }}";
        if (success) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
            });
            Toast.fire({
                icon: "success",
                title: success,
            });
        }
        var error = "{{ session('error') }}";
        if (error) {
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "{{ session('error') }}",
                toast: true, // This enables the toast mode
                position: "top-end", // Position of the toast
                showConfirmButton: false, // Hides the confirm button
                timer: 3000, // Time to show the toast in milliseconds
            });
        }
    });
    $(document).ready(function() {
        $(".js-example-basic").select2();
        $(".js-example-basic-multiple").select2();
    });
</script>
