@extends('frontend.layouts.vendor-layout')
@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Registration Bodies Submission</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/manager') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registration Bodies Submission</li>
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
            <form method="POST" action="{{ route('web.vendor.registration-bodies.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>External Body: <span class="text-danger">*</span></label>
                        <select class="form-control multi-select-boxes-v1" name="external_body" id="external_body">
                            <option value="" selected disabled>Select External Body</option>
                            @foreach ($registration_bodies_dropdown_data['external_bodies'] as $external_body)
                                <option value="{{ $external_body->id }}">
                                    {{ $external_body->body_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Registration Number: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="registration_number" id="registration_number"
                            placeholder="{{ str_repeat('x', 15) }}">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Registration Date: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control datepicker" name="registration_date"
                            id="registration_date" placeholder="Select Date">
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
                $('#external_body').select2();
                $(".datepicker").flatpickr();
            });
        </script>
    @endpush
@endsection
