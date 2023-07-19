{{--
<form action="{{ route('submission-details.project-teams.update', $projectTeams->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="member_name" value="{{ $projectTeams->member_name }}">
    <input type="text" name="role" value="{{ $projectTeams->role }}">
    <button type="submit">Update</button>
</form> --}}

<form action="{{ route('submission-details.project-teams.update', $project_Teams->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="member_name" value="{{ $project_Teams->member_name }}">
    <input type="text" name="role" value="{{ $project_Teams->role }}">
    <button type="submit">Update</button>
</form>



