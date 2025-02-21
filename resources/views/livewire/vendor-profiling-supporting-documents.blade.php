<div>
    <div class="accordion-item">
        <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="bg-dark-subtle w-100">
                    <h5 class="fs-5 fw-bold p-2 text-uppercase">Supporting Documents</h5>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 my-2" wire:ignore>
                        <label>Business Entity Type:</label>
                        <input id="fileInput" type="file" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $(document).ready(function() {
            $('#fileInput').fileinput({
                showUpload: false,
                showRemove: true,
                showPreview: false,
                allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif'],
                overwriteInitial: false,
                maxFileSize: 1024,
            });
        });
    </script>
@endscript
