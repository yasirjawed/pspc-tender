@extends('backend.layout.master')
@section('content')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/manager') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Roles</li>
                    </ol>
                </div>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Create New Role</h3>
                        </div>
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="exampleInputName">Role Name:</label>
                                    <input type="text" name="name" placeholder="Name" class="form-control">
                                </div>
                                <div class="form-group mb-3 d-none">
                                    <label for="exampleInputPassword1">Guard</label>
                                    <select name="guard_name" placeholder="Select Guard" class="form-control select2">
                                        <option selected disabled value="">Select Guard</option>
                                        <option value="admin" selected>Admin</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3 checkbox-wrapper-13">
                                    <label for="exampleInputPassword1">Role Permissions:</label><br>
                                    <div class="row">
                                        @foreach ($permission as $value)
                                            <div class="col-md-3 my-2">
                                                <input type="checkbox" name="permission[]" value="{{ $value->id }}" false class="name"> {{ $value->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('specific_css')
    <style>
        @supports (-webkit-appearance: none) or (-moz-appearance: none) {
            .checkbox-wrapper-13 input[type=checkbox] {
                --active: #275EFE;
                --active-inner: #fff;
                --focus: 2px rgba(39, 94, 254, .3);
                --border: #BBC1E1;
                --border-hover: #275EFE;
                --background: #fff;
                --disabled: #F6F8FF;
                --disabled-inner: #E1E6F9;
                -webkit-appearance: none;
                -moz-appearance: none;
                height: 21px;
                outline: none;
                display: inline-block;
                vertical-align: top;
                position: relative;
                margin: 0;
                cursor: pointer;
                border: 1px solid var(--bc, var(--border));
                background: var(--b, var(--background));
                transition: background 0.3s, border-color 0.3s, box-shadow 0.2s;
            }

            .checkbox-wrapper-13 input[type=checkbox]:after {
                content: "";
                display: block;
                left: 0;
                top: 0;
                position: absolute;
                transition: transform var(--d-t, 0.3s) var(--d-t-e, ease), opacity var(--d-o, 0.2s);
            }

            .checkbox-wrapper-13 input[type=checkbox]:checked {
                --b: var(--active);
                --bc: var(--active);
                --d-o: .3s;
                --d-t: .6s;
                --d-t-e: cubic-bezier(.2, .85, .32, 1.2);
            }

            .checkbox-wrapper-13 input[type=checkbox]:disabled {
                --b: var(--disabled);
                cursor: not-allowed;
                opacity: 0.9;
            }

            .checkbox-wrapper-13 input[type=checkbox]:disabled:checked {
                --b: var(--disabled-inner);
                --bc: var(--border);
            }

            .checkbox-wrapper-13 input[type=checkbox]:disabled+label {
                cursor: not-allowed;
            }

            .checkbox-wrapper-13 input[type=checkbox]:hover:not(:checked):not(:disabled) {
                --bc: var(--border-hover);
            }

            .checkbox-wrapper-13 input[type=checkbox]:focus {
                box-shadow: 0 0 0 var(--focus);
            }

            .checkbox-wrapper-13 input[type=checkbox]:not(.switch) {
                width: 21px;
            }

            .checkbox-wrapper-13 input[type=checkbox]:not(.switch):after {
                opacity: var(--o, 0);
            }

            .checkbox-wrapper-13 input[type=checkbox]:not(.switch):checked {
                --o: 1;
            }

            .checkbox-wrapper-13 input[type=checkbox]+label {
                display: inline-block;
                vertical-align: middle;
                cursor: pointer;
                margin-left: 4px;
            }

            .checkbox-wrapper-13 input[type=checkbox]:not(.switch) {
                border-radius: 7px;
            }

            .checkbox-wrapper-13 input[type=checkbox]:not(.switch):after {
                width: 5px;
                height: 9px;
                border: 2px solid var(--active-inner);
                border-top: 0;
                border-left: 0;
                left: 7px;
                top: 4px;
                transform: rotate(var(--r, 20deg));
            }

            .checkbox-wrapper-13 input[type=checkbox]:not(.switch):checked {
                --r: 43deg;
            }
        }

        .checkbox-wrapper-13 * {
            box-sizing: inherit;
        }

        .checkbox-wrapper-13 *:before,
        .checkbox-wrapper-13 *:after {
            box-sizing: inherit;
        }
    </style>
@endpush

@push('specific_js')
@endpush
