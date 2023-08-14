
<div class="modal fade" id="ReviewerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Project Team</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <h2>Select Reviewers for Project</h2>
           <!-- select-reviewers.blade.php -->
            <form action="{{ route('submission-details.reviews.assignReviewers') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Select Reviewers:</label>
                    <select name="reviewer_ids[]" class="form-control" multiple>
                        @foreach($reviewers as $reviewer)
                            <option value="{{ $reviewer->id }}">{{ $reviewer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Assign Reviewers</button>
            </form>
            </div>
        </div>
    </div>
</div> 
