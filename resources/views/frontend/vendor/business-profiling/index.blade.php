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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @dump($ExistingData)
            <form method="POST" action="{{ route('web.vendor.business-profiling.storeOrUpdateBusinessProfile') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" name="id" value="{{ $ExistingData->id ?? '' }}">
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Business Entity Type: <span class="text-danger">*</span></label>
                        <select class="form-control multi-select-boxes-v1" name="categories"
                            data-component="registration-bodies" id="entity_type" multiple>
                            @foreach ($DropDownData['business_categories'] as $business_category)
                                <option value="{{ $business_category->id }}"
                                    {{ in_array($business_category->id, explode(',', optional($ExistingData)->categories) ?? []) ? 'selected' : '' }}>
                                    {{ $business_category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Business Industry: <span class="text-danger">*</span></label>
                        <select class="form-control multi-select-boxes-v1" multiple name="industries">
                            @foreach ($DropDownData['business_industries'] as $business_industry)
                                <option value="{{ $business_industry->id }}"
                                    {{ in_array($business_industry->id, explode(',', optional($ExistingData)->industries) ?? []) ? 'selected' : '' }}>
                                    {{ $business_industry->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                        <label>Description / Details: <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description">{{ $ExistingData->description ?? '' }}</textarea>
                    </div>
                    <div class="bg-dark-subtle w-100 my-4">
                        <h5 class="fs-5 fw-bold p-2 text-uppercase">Basic Information</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                            <label>Business Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Business Name" name="name"
                                value="{{ $ExistingData->name ?? '' }}">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                            <label>Business Short Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Automatically generated"
                                name="short_name" value="{{ $ExistingData->short_name ?? '' }}">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                            <label>Origin Country: <span class="text-danger">*</span></label>
                            <select class="form-control select-boxes-v1" style="width:100% !important"
                                id="profiling-country" name="origin_country">
                                <option value="" selected disabled>Select Country</option>
                                @foreach ($DropDownData['countries'] as $country)
                                    <option value="{{ $country->id }}"
                                        {{ $country->id == optional($ExistingData)->origin_country ? 'selected' : '' }}>
                                        {{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                            <label>City: <span class="text-danger">*</span></label>
                            <select class="form-control select-boxes-v1" style="width:100% !important" name="city"
                                id="profiling-city">
                                <option value="">Select City</option>
                                @php
                                    $cities = $ExistingData->country->cities ?? [];
                                @endphp
                                @isset($cities)
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ $city->id == $ExistingData->city ? 'selected' : '' }}>
                                            {{ $city->name }}</option>
                                    @endforeach
                                @endisset

                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                            <label>Date Of Incorporation: <span class="text-danger">*</span></label>
                            <input type="date" class="form-control datepicker" name="date_of_incorporation"
                                placeholder="Date Of Incorporation"
                                value="{{ old('date_of_incorporation', optional($ExistingData)->date_of_incorporation ? \Carbon\Carbon::parse($ExistingData->date_of_incorporation)->format('Y-m-d') : '') }}">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                            <label>Website URL: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="website_url" placeholder="https://website.com"
                                value="{{ $ExistingData->website_url ?? '' }}">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                            <label>Business Logo: <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="logo">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 my-2 text-right">
                            <button type="submit" class="btn btn-dark">Submit</button>
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
                $("#profiling-country").change(function() {
                    console.log(1);
                    var country_id = $("#profiling-country").val();
                    let cityDropdown = $("#profiling-city");
                    if (country_id) {
                        $.ajax({
                            url: `/api/cities/${country_id}`,
                            method: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                cityDropdown.html('<option value="">Select City</option>');
                                $.each(data, function(id, name) {
                                    cityDropdown.append(
                                        `<option value="${id}">${name}</option>`);
                                });
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection
