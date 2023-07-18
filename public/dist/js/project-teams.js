function openEditProjectTeamModal(editProjectTeamUrl) {
    // Perform any additional actions before opening the modal

    // Make an AJAX request to fetch the edit user content
    $.ajax({
        url: editProjectTeamUrl,
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







// $('#EDITProjectTeam').on('edit.bs.modal', function (event) {
//     var button = $(event.relatedTarget); // Button that triggered the modal
//     var projectTeamId = button.data('project-team-id'); // Extract the project team ID from data attribute

//     // Make an AJAX request to fetch the project team details
//     $.ajax({
//         url: "{{ route('submission-details.project-teams.edit', ['project_team' => '']) }}/" + projectTeamId,
//         method: 'GET',
//         success: function(response) {
//             // Update the form fields with the fetched valuest
//             $('#EDITProjectTeam [name="member_name"]').val(response.member_name);
//             $('#EDITProjectTeam [name="role"]').val(response.role);
//         },
//         error: function() {
//             // Handle error if needed
//         }
//     });
// });

//   function openEditUserModal(projectTeamId) {
//     // Construct the edit URL using the project team ID
//     var editUserUrl = "{{ route('submission-details.project-teams.update', ['project_team' => '']) }}/" + projectTeamId;

//     // Make an AJAX request to fetch the edit user content
//     $.ajax({
//         url: editUserUrl,
//         method: 'GET',
//         success: function(response) {
//             // Update the modal body with the fetched content
//             $('#EDITProjectTeam .modal-body').html(response);

//             // Open the modal
//             $('#EDITProjectTeam').modal('show');
//         },
//         error: function() {
//             // Handle error if needed
//         }
//     });
// }

