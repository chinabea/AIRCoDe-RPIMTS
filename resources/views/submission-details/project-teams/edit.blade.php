
<div class="modal fade" id="EDITProjectTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Modal Title</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('submission-details.project-teams.update', $projectTeam->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="member_name" value="{{ $projectTeam->member_name }}">
                <input type="text" name="role" value="{{ $projectTeam->role }}">
                <button type="submit">Update</button>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
