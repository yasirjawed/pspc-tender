<div class="accordion" id="accordionExample">
    <!-- Section 1 -->
    <div class="accordion-item">
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="bg-dark-subtle w-100">
                    <h5 class="fs-5 fw-bold p-2 text-uppercase">Business Classification</h5>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2" wire:ignore>
                        <label>Business Entity Type:</label>
                        <select class="form-control multi-select-boxes-v1" name="entity_type"
                            data-component="registration-bodies" id="entity_type" multiple>
                            @foreach ($business_categories as $business_category)
                                <option value="{{ $business_category->id }}">{{ $business_category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2" wire:ignore>
                        <label>Business Industry:</label>
                        <select class="form-control multi-select-boxes-v1" multiple>
                            @foreach ($business_industries as $business_industry)
                                <option value="{{ $business_industry->id }}">{{ $business_industry->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 my-2" wire:ignore>
                        <label>Description / Details:</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="bg-dark-subtle w-100 my-4" wire:ignore>
                    <h5 class="fs-5 fw-bold p-2 text-uppercase">Basic Information</h5>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2" wire:ignore>
                        <label>Business Name:</label>
                        <input type="text" class="form-control" placeholder="Business Name">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2" wire:ignore>
                        <label>Business Short Name:</label>
                        <input type="text" class="form-control" placeholder="Automatically generated">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2" wire:ignore>
                        <label>Origin Classification:</label>
                        <div class="radio-group">
                            <label class="radio-container">
                                <input type="radio" name="origin_classification" value="local"
                                    wire:model.live="originClassification"
                                    {{ $originClassification == 'local' ? 'checked' : '' }}>
                                <span class="custom-radio"></span>
                                Local
                            </label>
                            <label class="radio-container">
                                <input type="radio" name="origin_classification"
                                    wire:model.live="originClassification" value="international"
                                    {{ $originClassification == 'international' ? 'checked' : '' }}>
                                <span class="custom-radio"></span>
                                International
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Origin Country:</label>
                        <select wire:model.live="selectedCountry" class="form-control select-boxes-v1"
                            style="width:100% !important" id="profiling-country" name="country">
                            <option value="" selected>Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>City:</label>
                        <select class="form-control select-boxes-v1" style="width:100% !important" name="city">
                            <option value="">Select City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                        <label>Date Of Incorporation:</label>
                        <input type="date" class="form-control datepicker" placeholder="Date Of Incorporation">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2" wire:ignore>
                        <label>Website URL:</label>
                        <input type="text" class="form-control" placeholder="https://website.com">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2" wire:ignore>
                        <label>Business Logo:</label>
                        <input type="file" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <button class="btn w-25 float-end save-btns" type="button">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('custom-css')
    <style>
        .select2-container {
            width: 100% !important;
            box-sizing: border-box !important;
        }

        .select2-selection {
            width: 100% !important;
        }
    </style>
@endpush
@push('custom-js')
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

        window.addEventListener('reinitilize-select2-inputs', event => {
            $(document).ready(function() {
                initializeSelect2();
                initializeFlatpickr();
            });
        });
        window.addEventListener('reset-country-select2', event => {
            $(document).ready(function() {
                $('#profiling-country').select2().val(null).trigger('change');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            initializeSelect2();
            initializeFlatpickr();
            $("#profiling-country").change(function() {
                var value = $("#profiling-country").val();
                @this.set('selectedCountry', value);
            });
        });
    </script>
@endpush
