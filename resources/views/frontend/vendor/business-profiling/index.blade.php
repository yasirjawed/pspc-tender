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
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 my-2" wire:ignore>
                    <label>Business Entity Type:</label>
                    <select class="form-control multi-select-boxes-v1" name="entity_type"
                        data-component="registration-bodies" id="entity_type" multiple>
                        @foreach ($DropDownData['business_categories'] as $business_category)
                            <option value="{{ $business_category->id }}">{{ $business_category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 my-2" wire:ignore>
                    <label>Business Industry:</label>
                    <select class="form-control multi-select-boxes-v1" multiple>
                        @foreach ($DropDownData['business_industries'] as $business_industry)
                            <option value="{{ $business_industry->id }}">{{ $business_industry->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    @push('specific_js')
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
