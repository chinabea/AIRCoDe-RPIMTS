
            <form action="{{ route('submission-details.project-teams.update', $projectTeams->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="member_name" value="{{ $projectTeams->member_name }}">
                <input type="text" name="role" value="{{ $projectTeams->role }}">
                <button type="submit">Update</button>
            </form>



