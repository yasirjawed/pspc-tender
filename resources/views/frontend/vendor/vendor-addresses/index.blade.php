@extends('frontend.layouts.vendor-layout')
@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Address(es)</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/manager') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Address(es)</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-end">
                    <a href="{{ route('web.vendor.vendor-addresses.create') }}"><button class="btn btn-dark">Add
                            Address</button></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                        <thead class="">
                            <tr>
                                <th>No</th>
                                <th>Address Type</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendorAddresses as $key => $vendorAddress)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $vendorAddress->addressType->name }}</td>
                                    <td>{{ $vendorAddress->country->name }}</td>
                                    <td>{{ $vendorAddress->city->name }}</td>
                                    <td>{{ $vendorAddress->email }}</td>
                                    <td>{{ $vendorAddress->mobile }}</td>
                                    <td>
                                        <a href="{{ route('web.vendor.vendor-addresses.edit', $vendorAddress->id) }}"><button
                                                class="btn btn-dark">Edit</button></a>
                                        <form
                                            action="{{ route('web.vendor.vendor-addresses.destroy', $vendorAddress->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger deleteRegistrationBody">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
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
