<form action="{{ route('submission-details.project-teams.update', $projectTeam->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="member_name" value="{{ $projectTeam->member_name }}">
    <input type="text" name="role" value="{{ $projectTeam->role }}">
    <button type="submit">Update</button>
</form>

