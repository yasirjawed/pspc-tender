@extends('frontend.layouts.vendor-layout')
@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Address Submission</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/manager') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Address Submission</li>
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
            {{-- @dump($ExistingData) --}}
            <form method="POST" action="{{ route('web.vendor.vendor-addresses.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Address Type: <span class="text-danger">*</span></label>
                        <select class="form-control custom-select-select2" name="address_type_id" id="address_type">
                            <option value="" selected disabled>Select Address Type</option>
                            @foreach ($vendor_address_dropdown_data['address_types'] as $address_type)
                                <option value="{{ $address_type->id }}">
                                    {{ $address_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Full Address: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Full Address" name="full_address"
                            id="full_address">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>ZIP Code: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="ZIP Code" name="zip_code" id="zip_code">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Country: <span class="text-danger">*</span></label>
                        <select class="form-control custom-select-select2" name="country_id" id="country_id">
                            <option value="" selected disabled>Select Country</option>
                            @foreach ($vendor_address_dropdown_data['countries'] as $country)
                                <option value="{{ $country->id }}">
                                    {{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>City: <span class="text-danger">*</span></label>
                        <select class="form-control custom-select-select2" name="city_id" id="city_id">
                            <option value="" selected disabled>Select City</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>GIS Latitude: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="GIS Latitude" name="gis_latitude"
                            id="gis_latitude">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>GIS Longitude: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="GIS Longitude" name="gis_longitude"
                            id="gis_longitude">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Email: <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Mobile: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Mobile" name="mobile" id="mobile">
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 my-2 text-right">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @push('specific_css')
    @endpush
    @push('specific_js')
        <script>
            $(document).ready(function() {
                $('.custom-select-select2').select2();
                $(".datepicker").flatpickr();
                $("#country_id").change(function() {
                    console.log(1);
                    var country_id = $("#country_id").val();
                    let cityDropdown = $("#city_id");
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
