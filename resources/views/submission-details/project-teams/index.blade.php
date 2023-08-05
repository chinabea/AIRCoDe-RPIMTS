@extends('layouts.template')
@section('title', 'Dashboard')

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
    </section>
        <div class="container">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projectTeams as $projectTeam)
                        <tr>
                            <td>{{ $projectTeam->member_name }}</td>
                            <td>{{ $projectTeam->role }}</td>
                            <td>
                            <a class="btn btn-primary btn-sm" onclick="openEditProjectTeamModal('{{ route('submission-details.project-teams.edit', $projectTeam) }}')">Edit</a>
                    
                                <form action="{{ route('submission-details.project-teams.destroy', $projectTeam->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
    <script>
        function openEditProjectTeamModal(editBookUrl) {
  $.ajax({
      url: editBookUrl,
      method: 'GET',
      success: function(response) {
          $('#EDITProjectTeam .modal-body').html(response);

          $('#EDITProjectTeam').modal('show');
      },
      error: function() {
      }
  });
}
</script>


@endsection
@include('submission-details.project-teams.modal')