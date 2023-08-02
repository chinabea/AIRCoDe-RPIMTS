<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <button onclick="openEditUserModal('{{ $projectTeam->id }}')">Edit</button>
                    @include('submission-details.project-teams.edit')

                    @push('scripts')
<script src="{{ asset('dist/js/project-teams.js') }}"></script>
@endpush


</body>
</html>
