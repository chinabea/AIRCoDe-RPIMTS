<!-- <form action="{{ route('submission-details.project-teams.update', $projectTeam->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="member_name" value="{{ $projectTeam->member_name }}">
    <input type="text" name="role" value="{{ $projectTeam->role }}">
    <button type="submit">Update</button>
</form> -->

<div class="card mb-3" id="editForm" style="display: none;">
    <div class="card-body">
        <form method="post" action="{{ route('submission-details.project-teams.update', $member->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row align-items-end">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="edit_member_name">Name:</label>
                        <input type="text" class="form-control" id="edit_member_name" name="member_name" value="{{ $member->member_name }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="edit_role">Role:</label>
                        <select class="form-control" id="edit_role" name="role" required>
                            <option disabled>Select Role</option>
                            <option{{ $member->role === 'Project Leader' ? ' selected' : '' }}>Project Leader</option>
                            <option{{ $member->role === 'Database Designer' ? ' selected' : '' }}>Database Designer</option>
                            <option{{ $member->role === 'Network Designer' ? ' selected' : '' }}>Network Designer</option>
                            <option{{ $member->role === 'UI Designer' ? ' selected' : '' }}>UI Designer</option>
                            <option{{ $member->role === 'Quality Assurance' ? ' selected' : '' }}>Quality Assurance</option>
                            <option{{ $member->role === 'Document Writer' ? ' selected' : '' }}>Document Writer</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                    <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

