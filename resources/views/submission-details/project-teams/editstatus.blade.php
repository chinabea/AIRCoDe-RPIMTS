<!-- Button to open the modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#statusModal">
    Update Status
</button>

<!-- The Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Update Project Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Status Update Form -->
                <form action="{{ route('projects.update', ['id' => $projects->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Draft" @if($projects->status === 'Draft') selected @endif>Draft</option>
                            <option value="Under Evaluation" @if($projects->status === 'Under Evaluation') selected @endif>Under Evaluation</option>
                            <option value="For Revision" @if($projects->status === 'For Revision') selected @endif>For Revision</option>
                            <option value="Approved" @if($projects->status === 'Approved') selected @endif>Approved</option>
                            <option value="Deferred" @if($projects->status === 'Deferred') selected @endif>Deferred</option>
                            <option value="Disapproved" @if($projects->status === 'Disapproved') selected @endif>Disapproved</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
