@extends('frontend.layouts.master')
@section('content')
    <section class="gradient-form mt-4">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-start" style="height:100vh">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="{{ asset('frontend/assets/img/pspc-logo.png') }}" style="width: 100px;" alt="logo">
                                        <h4 class="mt-1 mb-3 pb-1">RFQ & TENDERS MANAGEMENT SYSTEM</h4>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            @foreach ($errors->all() as $error)
                                                {{ $error }} <br>
                                            @endforeach
                                        </div>
                                    @endif
                                    <form action="#" method="POST">
                                        @csrf
                                        <div class="input-container mb-2">
                                            <input placeholder="Enter CNIC" class="input-field" type="text" name="cnic" required>
                                            <span class="input-highlight"></span>
                                        </div>
                                        <div class="input-container mb-2">
                                            <input placeholder="Enter Email" class="input-field" type="text" name="email" required>
                                            <span class="input-highlight"></span>
                                        </div>

                                        <div class="input-container mb-2 position-relative">
                                            <input id="password" placeholder="Enter Password" class="input-field" type="password" name="password" required>
                                            <span class="input-highlight"></span>
                                            <button type="button" id="togglePassword" class="btn btn-sm btn-outline-secondary position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%);">
                                                <i id="eyeIcon" class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="input-container mb-2 position-relative">
                                            <input id="password_confirmation" placeholder="Confirm Password" class="input-field" type="password" name="password_confirmation" required>
                                            <span class="input-highlight"></span>
                                            <button type="button" id="togglePassword2" class="btn btn-sm btn-outline-secondary position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%);">
                                                <i id="eyeIcon2" class="fa fa-eye"></i>
                                            </button>
                                        </div>

                                        <div class="text-center pt-1 mb-1 mt-1 pb-1">
                                            <button class="btn btn-dark btn-block w-100" type="button">Log in</button>
                                        </div>
                                        <a href="#" class="text-center" style="color:#006400">
                                            <p class="text-center">Already have an account?</p>
                                        </a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Pakistan Security Printing Corporation</h4>
                                    <p class="small mb-0 text-justify">The RFQ & Tender Management System is a comprehensive platform developed to streamline and enhance the procurement process for Pakistan Security Printing Corporation (PSPC), a subsidiary of the State Bank of Pakistan. This system enables PSPC to manage requests for quotations (RFQs) and tenders efficiently, ensuring transparency, accountability, and fairness in the selection of suppliers and contractors.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('custom-css')
        <style>
            .gradient-custom-2 {
                background: #003300;
            }

            @media (min-width: 768px) {
                .gradient-form {
                    height: 100vh !important;
                }
            }

            @media (min-width: 769px) {
                .gradient-custom-2 {
                    border-top-right-radius: .3rem;
                    border-bottom-right-radius: .3rem;
                }
            }

            .input-container {
                position: relative;
            }

            .input-field {
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: none;
                border-bottom: 2px solid #ccc;
                background-color: transparent;
                outline: none;
            }

            .input-highlight {
                position: absolute;
                bottom: 0;
                left: 0;
                height: 2px;
                width: 0;
                background-color: black;
                transition: all 0.3s ease;
            }

            .input-field:focus {
                color: black;
            }

            .input-field:focus+.input-highlight {
                width: 100%;
            }
        </style>
    @endpush
    @push('custom-js')
        <script>
            document.getElementById("togglePassword").addEventListener("click", function() {
                const passwordField = document.getElementById("password");
                const eyeIcon = document.getElementById("eyeIcon");
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    eyeIcon.classList.remove("fa-eye");
                    eyeIcon.classList.add("fa-eye-slash");
                } else {
                    passwordField.type = "password";
                    eyeIcon.classList.remove("fa-eye-slash");
                    eyeIcon.classList.add("fa-eye");
                }
            });
            document.getElementById("togglePassword2").addEventListener("click", function() {
                const passwordField = document.getElementById("password_confirmation");
                const eyeIcon = document.getElementById("eyeIcon2");
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    eyeIcon.classList.remove("fa-eye");
                    eyeIcon.classList.add("fa-eye-slash");
                } else {
                    passwordField.type = "password";
                    eyeIcon.classList.remove("fa-eye-slash");
                    eyeIcon.classList.add("fa-eye");
                }
            });
        </script>
    @endpush
@endsection
