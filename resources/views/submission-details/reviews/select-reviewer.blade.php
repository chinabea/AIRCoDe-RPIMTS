<div class="modal fade" id="ReviewerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Select Reviewers for the Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            <form method="POST" action="{{ route('store.project.reviewers') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="project_id" value="{{ $records->id }}">
                <div class="form-group">
                    <label for="reviewer_ids[]">Select Reviewers:</label>
                    <select name="reviewer_ids[]" id="reviewer_ids[]" class="form-control" multiple size="4">
                        @foreach ($reviewersss as $reviewer)
                        <option value="{{ $reviewer->id }}">{{ $reviewer->name }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="deadline">Review Deadline:</label>
                    <input type="date" name="deadline" id="deadline" class="form-control">
                </div> 
                

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Assign Reviewers</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
