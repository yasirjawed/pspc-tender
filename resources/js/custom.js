import Swal from "sweetalert2";
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
        willClose: () => {},
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
        text: msg,
        toast: true, // This enables the toast mode
        position: "top-end", // Position of the toast
        showConfirmButton: false, // Hides the confirm button
        timer: 3000, // Time to show the toast in milliseconds
    });
}
$(document).ready(function () {
    // ShowSuccess("SweetAlert2 is working!");
    if (window.Laravel.successMessage) {
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
            title: window.Laravel.successMessage,
        });
    }
    if (window.Laravel.errorMessage) {
        Swal.fire({
            icon: "error",
            title: "Error!",
            text: window.Laravel.errorMessage,
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
        });
    }
});
window.addEventListener("error", (event) => {
    Swal.fire({
        icon: "error",
        title: "Oops...",
        title: event.detail[0].msg,
        toast: true, // This enables the toast mode
        position: "top-end", // Position of the toast
        showConfirmButton: false, // Hides the confirm button
        timer: 3000, // Time to show the toast in milliseconds
    });
});
window.addEventListener("success", (event) => {
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
        title: event.detail[0].msg,
    });
});
