@extends('frontend.layouts.vendor-layout')
@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Supporting Documents</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/manager') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Supporting Documents</li>
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
            <form method="POST" action="{{ route('web.vendor.supporting-documents.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Document Type: <span class="text-danger">*</span></label>
                        <select class="form-control multi-select-boxes-v1" name="document_type_id" id="document_type_id">
                            <option value="" selected disabled>Select Document Type</option>
                            @foreach ($supporting_documents_dropdown_data['document_types'] as $document_type)
                                <option value="{{ $document_type->id }}">
                                    {{ $document_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Document: <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="document" id="document">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 my-2 text-right">
                    <button type="submit" class="btn btn-dark">Add Supporting Document</button>
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
