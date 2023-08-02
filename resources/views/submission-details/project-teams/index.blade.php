@extends('layouts.template')
@section('title', 'Project Detail')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('layouts.topnav')
@include('layouts.sidebar')

<div class="container">
                <table>
                    <thead>
                        <tr>
                            {{-- edit --}}
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
  // Perform any additional actions before opening the modal

  // Make an AJAX request to fetch the edit user content
  $.ajax({
      url: editBookUrl,
      method: 'GET',
      success: function(response) {
          // Update the modal body with the fetched content
          $('#EDITProjectTeam .modal-body').html(response);

          // Open the modal
          $('#EDITProjectTeam').modal('show');
      },
      error: function() {
          // Handle error if needed
      }
  });
}
</script>





</body>
</html>
               


@include('submission-details.project-teams.modal')