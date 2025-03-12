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
            {{-- @dump(session('profile_incomplete')) --}}
            <h4 class="mb-4">Vendor Profile Completion Steps</h4>
            <div class="step-container">
                <!-- Addresses -->
                <div class="step {{ session('profile_incomplete.business-profile') ? 'incomplete' : 'completed' }}">
                    <span class="circle">{!! session('profile_incomplete.business-profile')
                        ? '<i class="fa fa-business-time"></i>'
                        : '<i class="fa fa-business-time"></i>' !!}</span>
                    <div class="step-title">Business Profile</div>
                </div>

                <div class="step {{ session('profile_incomplete.registeration-bodies') ? 'incomplete' : 'completed' }}">
                    <span class="circle">{!! session('profile_incomplete.registeration-bodies')
                        ? '<i class="fa fa-registered"></i>'
                        : '<i class="fa fa-registered"></i>' !!}</span>
                    <div class="step-title">Registeration Bodies</div>
                </div>

                <div class="step {{ session('profile_incomplete.supporting-documents') ? 'incomplete' : 'completed' }}">
                    <span class="circle">{!! session('profile_incomplete.supporting-documents')
                        ? '<i class="fa fa-folder-open"></i>'
                        : '<i class="fa fa-folder-open"></i>' !!}</span>
                    <div class="step-title">Supporting Documents</div>
                </div>

                <div class="step {{ session('profile_incomplete.vendor-addresses') ? 'incomplete' : 'completed' }}">
                    <span class="circle">{!! session('profile_incomplete.vendor-addresses')
                        ? '<i class="fa fa-map-location-dot"></i>'
                        : '<i class="fa fa-map-location-dot"></i>' !!}</span>
                    <div class="step-title">Address(es)</div>
                </div>
                {{-- @dump(session('profile_incomplete.ppra-registrations')) --}}
                <div class="step {{ session('profile_incomplete.ppra-registrations') ? 'incomplete' : 'completed' }}">
                    <span class="circle">{!! session('profile_incomplete.ppra-registrations')
                        ? '<i class="fa fa-id-card"></i>'
                        : '<i class="fa fa-id-card"></i>' !!}</span>
                    <div class="step-title">PPRA Registeration</div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center mt-5">
            <div class="row">
                <!-- Statistics Cards -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Tenders</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTenders ?? 0 }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file-contract fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total RFQ's</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-trophy fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Downloaded Tenders
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Bid Evaluations</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Recent Tender Activity</h6>
                        </div>
                        <div class="card-body">
                            <div class="activity-feed">
                                @forelse($recentActivities ?? [] as $activity)
                                    <div class="feed-item">
                                        <div class="date">{{ $activity->created_at->diffForHumans() }}</div>
                                        <div class="text">{{ $activity->description }}</div>
                                    </div>
                                @empty
                                    <p class="text-center">No recent activities</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Upcoming Deadlines</h6>
                        </div>
                        <div class="card-body">
                            <div class="deadline-list">
                                @forelse($upcomingDeadlines ?? [] as $deadline)
                                    <div class="deadline-item">
                                        <div class="deadline-info">
                                            <h6 class="deadline-title">{{ $deadline->title }}</h6>
                                            <p class="deadline-date">Due: {{ $deadline->due_date }}</p>
                                        </div>
                                        <div class="deadline-status">
                                            <span class="badge bg-warning">Pending</span>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-center">No upcoming deadlines</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('specific_css')
        <style>
            body {
                background-color: #f8f9fa;
            }

            /* Enhanced Step Container Styles */
            .step-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                max-width: 100%;
                margin: 2rem auto;
                position: relative;
                padding: 2rem;
                background: #ffffff;
                border-radius: 20px;
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08);
            }

            .step {
                text-align: center;
                flex: 1;
                position: relative;
                padding: 0 20px;
                min-width: 200px;
            }

            .step::before {
                content: "";
                position: absolute;
                top: 35px;
                left: calc(50% + 45px);
                width: calc(100% - 90px);
                height: 4px;
                background: #e9ecef;
                z-index: 1;
            }

            .step:last-child::before {
                display: none;
            }

            .step.completed::before {
                background: linear-gradient(90deg, #28a745 0%, #20c997 100%);
            }

            .step .circle {
                width: 70px;
                height: 70px;
                line-height: 70px;
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 28px;
                position: relative;
                z-index: 2;
                transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
                background: #ffffff;
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            }

            .step:hover .circle {
                transform: scale(1.1) translateY(-5px);
            }

            .completed .circle {
                background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
                color: white;
            }

            .incomplete .circle {
                background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
                color: white;
            }

            .step-title {
                margin-top: 1rem;
                font-size: 1rem;
                font-weight: 600;
                color: #5a5c69;
                white-space: nowrap;
                position: relative;
                transition: all 0.3s ease;
            }

            .completed .step-title {
                color: #28a745;
            }

            .incomplete .step-title {
                color: #dc3545;
            }

            .step .status-indicator {
                position: absolute;
                top: -5px;
                right: -5px;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 12px;
                color: white;
                z-index: 3;
            }

            .completed .status-indicator {
                background: #28a745;
                content: "✓";
            }

            .incomplete .status-indicator {
                background: #dc3545;
                content: "!";
            }

            @media (max-width: 1200px) {
                .step-container {
                    padding: 1.5rem 1rem;
                }

                .step {
                    padding: 0 10px;
                    min-width: 150px;
                }

                .step::before {
                    left: calc(50% + 35px);
                    width: calc(100% - 70px);
                }
            }

            @media (max-width: 768px) {
                .step-container {
                    flex-direction: column;
                    align-items: flex-start;
                    padding: 1rem;
                }

                .step {
                    flex: none;
                    width: 100%;
                    display: flex;
                    align-items: center;
                    padding: 1rem 0;
                    min-width: auto;
                }

                .step::before {
                    top: auto;
                    left: 35px;
                    width: 4px;
                    height: 100%;
                    bottom: -50%;
                }

                .step .circle {
                    width: 60px;
                    height: 60px;
                    line-height: 60px;
                    font-size: 24px;
                    margin-right: 1rem;
                }

                .step-title {
                    margin-top: 0;
                    text-align: left;
                }
            }

            /* New Dashboard Styles */
            .border-left-primary {
                border-left: 4px solid #4e73df !important;
            }

            .border-left-success {
                border-left: 4px solid #1cc88a !important;
            }

            .border-left-info {
                border-left: 4px solid #36b9cc !important;
            }

            .border-left-warning {
                border-left: 4px solid #f6c23e !important;
            }

            .text-gray-300 {
                color: #dddfeb !important;
            }

            .text-gray-800 {
                color: #5a5c69 !important;
            }

            .activity-feed {
                padding: 15px;
            }

            .feed-item {
                padding: 15px 0;
                border-bottom: 1px solid #e3e6f0;
            }

            .feed-item:last-child {
                border-bottom: none;
            }

            .feed-item .date {
                color: #858796;
                font-size: 0.85rem;
            }

            .feed-item .text {
                margin-top: 5px;
                color: #5a5c69;
            }

            .deadline-list {
                padding: 15px;
            }

            .deadline-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px 0;
                border-bottom: 1px solid #e3e6f0;
            }

            .deadline-item:last-child {
                border-bottom: none;
            }

            .deadline-title {
                margin: 0;
                color: #5a5c69;
            }

            .deadline-date {
                margin: 5px 0 0;
                color: #858796;
                font-size: 0.85rem;
            }

            .card {
                transition: transform 0.2s ease-in-out;
            }

            .card:hover {
                transform: translateY(-5px);
            }

            .shadow {
                box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
            }
        </style>
    @endpush
    @push('specific_js')
        <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
            integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
            integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script> <!-- jsvectormap -->
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('body').removeClass('sidebar-open').addClass('sidebar-collapse');
            });
        </script>
    @endpush
@endsection
