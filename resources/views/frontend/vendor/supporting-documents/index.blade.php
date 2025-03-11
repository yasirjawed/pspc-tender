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
            <div class="row">
                <div class="col-md-12 text-end">
                    <a href="{{ route('web.vendor.supporting-documents.create') }}"><button class="btn btn-dark">Add
                            Supporting Document</button></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                        <thead class="">
                            <tr>
                                <th>No</th>
                                <th>Document Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('specific_css')
    @endpush
    @push('specific_js')
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
                $('.deleteRegistrationBody').click(function() {
                    if (confirm('Are you sure you want to delete this registration body?')) {
                        return true;
                    }
                });
            });
        </script>
    @endpush
@endsection
