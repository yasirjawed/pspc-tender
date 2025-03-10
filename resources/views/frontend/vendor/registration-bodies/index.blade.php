@extends('frontend.layouts.vendor-layout')
@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Registration Bodies</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/manager') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registration Bodies</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-end">
                    <a href="{{ route('web.vendor.registration-bodies.create') }}"><button class="btn btn-dark">Add
                            Registration Body</button></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                        <thead class="">
                            <tr>
                                <th>No</th>
                                <th>External Body</th>
                                <th>Registration Number</th>
                                <th>Registration Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrationBodies as $index => $registrationBody)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $registrationBody->externalBody->body_name }}</td>
                                    <td>{{ $registrationBody->registration_number }}</td>
                                    <td>{{ $registrationBody->registration_date }}</td>
                                    <td>{{ $registrationBody->status == 0 ? 'Pending' : 'Active' }}</td>
                                    <td>
                                        <a href="{{ route('web.vendor.registration-bodies.edit', $registrationBody->id) }}"><button
                                                class="btn btn-dark">Edit</button></a>
                                        <form
                                            action="{{ route('web.vendor.registration-bodies.destroy', $registrationBody->id) }}"
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

    <!-- Add Registration Body Modal -->
    {{-- <div class="modal fade" id="addRegistrationBodyModal" tabindex="-1" aria-labelledby="addRegistrationBodyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="addRegistrationBodyModalLabel">
                        <i class="fas fa-plus-circle me-2"></i>Add Registration Body
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="registrationBodyForm">
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="externalBody" class="form-label fw-bold">External Body</label>
                                    <input type="text" class="form-control shadow-sm" id="externalBody"
                                        name="external_body" placeholder="Enter external body name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="registrationNumber" class="form-label fw-bold">Registration Number</label>
                                    <input type="text" class="form-control shadow-sm" id="registrationNumber"
                                        name="registration_number" placeholder="Enter registration number" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="registrationDate" class="form-label fw-bold">Registration Date</label>
                                    <input type="date" class="form-control shadow-sm" id="registrationDate"
                                        name="registration_date" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="status" class="form-label fw-bold">Status</label>
                                    <select class="form-select shadow-sm" id="status" name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Please ensure all fields are filled correct before submitting.
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i>Close
                        </button>
                        <button type="submit" class="btn btn-primary px-4" onclick="submitForm()">
                            <i class="fas fa-save me-2"></i>Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
