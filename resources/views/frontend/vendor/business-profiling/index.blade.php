@extends('frontend.layouts.vendor-layout')
@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Business Profiling</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/manager') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Business Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container">
            <form method="POST" action="{{ 'web.vendor.business-profiling.storeOrUpdateBusinessProfile' }}">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Business Entity Type:</label>
                        <select class="form-control multi-select-boxes-v1" name="entity_type"
                            data-component="registration-bodies" id="entity_type" multiple>
                            @foreach ($DropDownData['business_categories'] as $business_category)
                                <option value="{{ $business_category->id }}">{{ $business_category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Business Industry:</label>
                        <select class="form-control multi-select-boxes-v1" multiple>
                            @foreach ($DropDownData['business_industries'] as $business_industry)
                                <option value="{{ $business_industry->id }}">{{ $business_industry->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                        <label>Description / Details:</label>
                        <textarea class="form-control"></textarea>
                    </div>
                    <div class="bg-dark-subtle w-100 my-4">
                        <h5 class="fs-5 fw-bold p-2 text-uppercase">Basic Information</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                            <label>Business Name:</label>
                            <input type="text" class="form-control" placeholder="Business Name">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                            <label>Business Short Name:</label>
                            <input type="text" class="form-control" placeholder="Automatically generated">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                            <label>Origin Country:</label>
                            <select class="form-control select-boxes-v1" style="width:100% !important"
                                id="profiling-country" name="country">
                                <option value="" selected disabled>Select Country</option>
                                @foreach ($DropDownData['countries'] as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                            <label>City:</label>
                            <select class="form-control select-boxes-v1" style="width:100% !important" name="city">
                                <option value="">Select City</option>
                                {{-- @foreach ($DropDownDatacities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach --}}
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                            <label>Date Of Incorporation:</label>
                            <input type="date" class="form-control datepicker" placeholder="Date Of Incorporation">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                            <label>Website URL:</label>
                            <input type="text" class="form-control" placeholder="https://website.com">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                            <label>Business Logo:</label>
                            <input type="file" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @push('specific_css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush
    @push('specific_js')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            function initializeSelect2() {
                $(".multi-select-boxes-v1").select2({
                    allowClear: true,
                    placeholder: "Select Option",
                });
                $(".select-boxes-v1").select2();
            }

            function initializeFlatpickr() {
                $(".datepicker").flatpickr({
                    maxDate: "today",
                });
            }
            $(document).ready(function() {
                initializeSelect2();
                initializeFlatpickr();
            });
        </script>
    @endpush
@endsection
