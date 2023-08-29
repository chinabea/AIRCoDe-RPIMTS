<div class="modal fade" id="filesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Project Team</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>Upload Files</h2>
                <form id="" method="post" action="{{ route('submission-details.files.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $records->id }}">
                    <div class="form-group">
                        <label for="file">Choose File:</label>
                        <input type="file" class="form-control-file" id="file" name="file" accept=".pdf, .doc, .docx" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload File</button>
                </form>
            </div>
        </div>
    </div>
</div> 
