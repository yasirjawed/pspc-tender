@extends('backend.layout.auth-layout.master')
@section('content')
    <section class="gradient-form">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center" style="height:100vh">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="{{ asset('backend/assets/img/pspc-logo.png') }}" style="width: 100px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">PSPC TENDER MANAGEMENT PORTAL</h4>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            @foreach ($errors->all() as $error)
                                                {{ $error }} <br>
                                            @endforeach
                                        </div>
                                    @endif
                                    <form action="{{ route('manager.login.post') }}" method="POST">
                                        @csrf
                                        <div data-mdb-input-init class="input-container mb-2">
                                            <input placeholder="Enter Email" class="input-field" type="text" name="email" required>
                                            <span class="input-highlight"></span>
                                        </div>

                                        <div data-mdb-input-init class="input-container mb-2">
                                            <input placeholder="Enter Password" class="input-field" type="password" name="password" required>
                                            <span class="input-highlight"></span>
                                        </div>

                                        <div class="text-center pt-1 mb-5 mt-3 pb-1">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-block" type="submit">Log in</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Pakistan Security Printing Corporation</h4>
                                    <p class="small mb-0">The PSPC E-Hiring Portal is a dedicated platform designed to streamline the recruitment process for Pakistan Security Printing Corporation (Pvt.) Limited, a subsidiary of the State Bank of Pakistan. This portal enables potential candidates to explore job opportunities, submit applications, and track their application status effortlessly. With a user-friendly interface and advanced features, the E-Hiring Portal ensures a transparent, efficient, and secure recruitment process, aligning with PSPC’s mission of integrity and excellence in producing high-quality security products for the federal government.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('specific_css')
        <style>
            .gradient-custom-2 {
                background: #003300;
            }

            @media (min-width: 768px) {
                .gradient-form {
                    /* height: 100vh !important; */
                }
            }

            @media (min-width: 769px) {
                .gradient-custom-2 {
                    border-top-right-radius: .3rem;
                    border-bottom-right-radius: .3rem;
                }
            }

            /* From Uiverse.io by Satwinder04 */
            /* Input container */
            .input-container {
                position: relative;
            }

            /* Input field */
            .input-field {
                display: block;
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: none;
                border-bottom: 2px solid #ccc;
                outline: none;
                background-color: transparent;
            }


            /* Input highlight */
            .input-highlight {
                position: absolute;
                bottom: 0;
                left: 0;
                height: 2px;
                width: 0;
                background-color: black;
                transition: all 0.3s ease;
            }

            /* Input field:focus styles */
            .input-field:focus {
                top: -20px;
                /* font-size: 12px; */
                color: black;
            }

            .input-field:focus+.input-highlight {
                width: 100%;
            }
        </style>
    @endpush
    @push('specific_js')
    @endpush
@endsection
