@extends('frontend.layouts.vendor-layout')
@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Vendor Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('web.vendor.profile.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid text-center mt-5">
            @dump(session('profile_incomplete'))
            <h4 class="mb-4">Vendor Profile Completion Steps</h4>
            <div class="step-container">
                <!-- Addresses -->
                <div class="step {{ session('profile_incomplete.business-profile') ? 'incomplete' : 'completed' }}">
                    <span class="circle">{!! session('profile_incomplete.business-profile') ? '<i class="fa fa-x"></i>' : '<i class="fa fa-check"></i>' !!}</span>
                    <div class="step-title">Business Profile</div>
                </div>

                <div class="step {{ session('profile_incomplete.registeration-bodies') ? 'incomplete' : 'completed' }}">
                    <span class="circle">{!! session('profile_incomplete.registeration-bodies')
                        ? '<i class="fa fa-x"></i>'
                        : '<i class="fa fa-check"></i>' !!}</span>
                    <div class="step-title">Registeration Bodies</div>
                </div>

                <div class="step {{ session('profile_incomplete.supporting-documents') ? 'incomplete' : 'completed' }}">
                    <span class="circle">{!! session('profile_incomplete.supporting-documents')
                        ? '<i class="fa fa-x"></i>'
                        : '<i class="fa fa-check"></i>' !!}</span>
                    <div class="step-title">Supporting Documents</div>
                </div>

                <div class="step {{ session('profile_incomplete.vendor-addresses') ? 'incomplete' : 'completed' }}">
                    <span class="circle">{!! session('profile_incomplete.vendor-addresses') ? '<i class="fa fa-x"></i>' : '<i class="fa fa-check"></i>' !!}</span>
                    <div class="step-title">Address(es)</div>
                </div>
                {{-- @dump(session('profile_incomplete.ppra-registrations')) --}}
                <div class="step {{ session('profile_incomplete.ppra-registrations') ? 'incomplete' : 'completed' }}">
                    <span class="circle">{!! session('profile_incomplete.ppra-registrations') ? '<i class="fa fa-x"></i>' : '<i class="fa fa-check"></i>' !!}</span>
                    <div class="step-title">PPRA Registeration</div>
                </div>
            </div>
        </div>
    </div>
    @push('specific_css')
        <style>
            body {
                background-color: #f8f9fa;
            }

            .step-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                max-width: 100%;
                margin: auto;
                position: relative;
                padding: 40px 0;
            }

            .step {
                text-align: center;
                flex: 1;
                position: relative;
            }

            .step .circle {
                width: 50px;
                height: 50px;
                line-height: 50px;
                border-radius: 50%;
                display: inline-block;
                font-size: 24px;
                font-weight: bold;
                position: relative;
                z-index: 2;
            }

            .completed .circle {
                background-color: #28a745;
                color: white;
            }

            .incomplete .circle {
                background-color: #dc3545;
                color: white;
            }

            .blinking {
                width: 12px;
                height: 12px;
                background-color: red;
                border-radius: 50%;
                display: inline-block;
                position: absolute;
                top: -5px;
                right: -5px;
                animation: blink 1s infinite alternate;
            }

            @keyframes blink {
                0% {
                    opacity: 1;
                }

                100% {
                    opacity: 0.2;
                }
            }

            .step::before {
                content: "";
                position: absolute;
                width: 100%;
                height: 6px;
                background-color: #ccc;
                top: 50%;
                left: 50%;
                transform: translateY(-50%);
                z-index: 1;
            }

            /* .step:first-child::before { */
            /*width: 50%;*/
            /*left: 50%;*/
            /*}*/

            .step:last-child::before {
                width: 50%;
                left: 0;
            }

            .step-title {
                margin-top: 10px;
                font-size: 14px;
                font-weight: bold;
                white-space: nowrap;
            }
        </style>
    @endpush
    @push('specific_js')
        <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
            integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
            integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script> <!-- jsvectormap -->
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    @endpush
@endsection
