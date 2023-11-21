
<div class="modal fade" id="pdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Report Options</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('generate.projects.report') }}" method="post">
                    @csrf

                    <label for="page_size">Page Size:</label>
                    <select class="selectpicker form-control" name="page_size" id="page_size">
                        <option value="" disabled selected>Select Size</option>
                        <option value="letter">Letter</option>
                        <option value="a4">A4</option>
                        <option value="legal">Legal</option>
                    </select>

                    <label for="orientation">Orientation:</label>
                    <select class="selectpicker form-control" name="orientation" id="orientation">
                        <option value="" disabled selected>Select Orientation</option>
                        <option value="portrait">Portrait</option>
                        <option value="landscape">Landscape</option>
                    </select>

                    <label for="file_type">File Type:</label>
                    <select class="selectpicker form-control" name="file_type" id="file_type">
                        <option value="" selected>Select Type</option>
                        <option value="pdf">PDF</option>
                        <option value="excel">Excel</option>
                        <option value="stream">Stream</option>
                    </select>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-navy color-palette float-right" style="background-color: #022A44;">
                            <i class="fas fa-file-pdf"></i> Export to PDF
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
