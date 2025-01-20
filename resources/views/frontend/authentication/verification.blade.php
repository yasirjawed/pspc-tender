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
                                    <livewire:verification-page :user="$user" />
                                </div>
                            </div>
                            <!-- Hide this column on mobile devices using d-none d-lg-block classes -->
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
    @endpush
@endsection
