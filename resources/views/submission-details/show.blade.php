@extends('layouts.template')
@section('title', 'Dashboard')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
  </section>
    <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header text-center">
                  SUBMISSION DETAILS
                </h3>
              </div>
              <div class="card-body pad table-responsive">
                <table class="table table-bordered table-sm text-right">
                    <tbody>
                        <tr>
                        <th scope="row" width="25%">PROJECT ID</th>
                        <td class="text-left">{{ $records->id }}</td>
                        </tr>
                        <tr>
                        <th scope="row" width="25%">PROJECT TITLE</th>
                        <td class="text-left">{{ $records->projname }}</td>
                        </tr>
                        <tr>
                        <th scope="row">PROJECT GROUP</th>
                        <td class="text-left">{{ $records->researchgroup }}</td>
                        </tr>
                        <tr>
                        <th scope="row">STATUS</th>
                        <td class="text-left">{{ $records->status }}</td>
                        </tr>
                        <tr>
                        <th scope="row">DATE SUBMITTED</th>
                        <td class="text-left">{{ ($records->created_at) }}</td>
                        </tr>
                        <tr>
                        <th scope="row">LAST UPDATE</th>
                        <td class="text-left">{{ ($records->updated_at) }}</td>
                        </tr>

                    </tbody>
                </table>
              </div>
            </div>
          </div>

  <div class="col-md-12">
    <div class="text-center">
        <button id="actions-btn" class="btn btn-primary">
            <i class="fas fa-cogs mr-2"></i>Actions
        </button>
        <button id="details-btn" class="btn btn-primary my-2">
            <i class="fas fa-info-circle mr-2"></i>Details
        </button>
        <button id="lib-btn" class="btn btn-primary my-2">
            <i class="fas fa-list-alt mr-2"></i>Line-Item Budget
        </button>
        <button id="classifications-btn" class="btn btn-primary my-2">
            <i class="fas fa-tags mr-2"></i>Classifications
        </button>
        <button id="files-btn" class="btn btn-primary my-2">
            <i class="fas fa-file-alt mr-2"></i>Files
        </button>
        <button id="messages-btn" class="btn btn-primary my-2">
            <i class="fas fa-comments mr-2"></i>Messages
        </button>
        <button id="project-team-btn" class="btn btn-primary my-2">
            <i class="fas fa-users mr-2"></i>Project Team
        </button>
        <button id="status-btn" class="btn btn-primary my-2">
            <i class="fas fa-tasks mr-2"></i>Status
        </button>
        <button id="reviewer-btn" class="btn btn-primary my-2">
            <i class="fas fa-user-check mr-2"></i>Reviewer
        </button>
        <button id="cash-program-btn" class="btn btn-primary my-2">
            <i class="fas fa-money-bill-wave mr-2"></i>Cash Program
        </button>
        <button id="reprogramming-status-btn" class="btn btn-primary my-2">
            <i class="fas fa-sync-alt mr-2"></i>Reprogramming Status
        </button>



    <form id="actions-form" class="mt-4" style="display: none;">
    <!-- Form fields go here -->
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
            ACTIONS
        </div>
        <div class="card-body pad table-responsive">

        </div>
      </div>
    </div>
    </form>

    <form id="details-form" class="mt-4" style="display: none;">
    <!-- Form fields go here -->
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
            DETAILS
          </h3>
        </div>
        <div class="card-body pad table-responsive">


        </div>
      </div>
    </div>
    </form>

    <form id="lib-form" class="mt-4" style="display: none;">
    <!-- Form fields go here -->
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          LINE-ITEM BUDGET
          </h3>
        </div>
        <div class="card-body pad table-responsive">


        </div>
      </div>
    </div>
    </form>

    <form id="classifications-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
                CLASSIFICATIONS
          </h3>
        </div>
        <div class="card-body pad table-responsive">


        </div>
      </div>
    </div>
    </form>

    <form id="files-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
                FILES
          </h3>
        </div>
        <div class="card-body pad table-responsive">


        </div>
      </div>
    </div>
    </form>

    <form id="messages-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
                MESSAGES
          </h3>
        </div>
        <div class="card-body pad table-responsive">


        </div>
      </div>
    </div>
    </form>

    <div id="project-team-form" class="mt-4" style="display: none;">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
                PROJECT TEAM
            </div>
            <div class="card-body pad table-responsive">
            <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#ProjectTeam">Add Project Members</button>
                @include('submission-details.project-teams.create')
              @foreach($teamMembers as $member)
                  <div class="card mb-3">
                      <div class="card-body">
                          <div class="form-row align-items-end">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="member_name">Name:</label>
                                      <input type="text" class="form-control" id="member_name{{ $member->id }}" name="member_name" value="{{ $member->member_name }}" readonly>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="role">Role:</label>
                                      <select class="form-control" id="role{{ $member->id }}" name="role" readonly>
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
                              <button type="button" class="btn btn-primary mr-2" onclick="toggleEdit({{ $member->id }})" id="updateButton{{ $member->id }}">Update</button>
                                  <form action="{{ route('submission-details.project-teams.destroy', $member->id) }}" method="post" class="d-flex">
                                      <!-- Existing code for the delete button -->
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                  </form>
                              </div>
                          </div>
                          <!-- The edit form for updating each member -->
                          <form method="post" action="{{ route('submission-details.project-teams.update', $member->id) }}" enctype="multipart/form-data" id="updateForm{{ $member->id }}" style="display: none;">
                              <!-- Existing code for the edit form -->
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
                                        <button type="button" class="btn btn-secondary" onclick="cancelEdit({{ $member->id }})">Cancel</button>
                                    </div>
                                </div>
                          </form>
                      </div>
                  </div>

                  
              @endforeach
              <script>
                function toggleEdit(memberId) {
                    const memberNameInput = document.getElementById(`member_name${memberId}`);
                    const roleSelect = document.getElementById(`role${memberId}`);
                    const updateButton = document.getElementById(`updateButton${memberId}`);
                    const form = document.getElementById(`updateForm${memberId}`);

                    memberNameInput.readOnly = !memberNameInput.readOnly;
                    roleSelect.disabled = !roleSelect.disabled;

                    if (memberNameInput.readOnly) {
                        updateButton.innerText = 'Update';
                        form.style.display = "none";
                    } else {
                        updateButton.innerText = 'Save';
                        // Hide other update forms and show the current one
                        const allUpdateForms = document.querySelectorAll('[id^="updateForm"]');
                        allUpdateForms.forEach(form => {
                            form.style.display = "none";
                        });
                        form.style.display = "block";
                        form.scrollIntoView({ behavior: 'smooth', block: 'start' }); // Scroll to the form

                        // Hide the Save and Delete buttons for the current member
                        const saveButton = document.getElementById(`saveButton${memberId}`);
                        const deleteButton = document.getElementById(`deleteButton${memberId}`);
                        saveButton.style.display = "none";
                        deleteButton.style.display = "none";
                    }
                }

                function cancelEdit(memberId) {
                    const memberNameInput = document.getElementById(`member_name${memberId}`);
                    const roleSelect = document.getElementById(`role${memberId}`);
                    const updateButton = document.getElementById(`updateButton${memberId}`);
                    const form = document.getElementById(`updateForm${memberId}`);

                    memberNameInput.readOnly = !memberNameInput.readOnly;
                    roleSelect.disabled = !roleSelect.disabled;

                    updateButton.innerText = 'Update';
                    form.style.display = "none";

                    // Show the Save and Delete buttons for the current member
                    const saveButton = document.getElementById(`saveButton${memberId}`);
                    const deleteButton = document.getElementById(`deleteButton${memberId}`);
                    saveButton.style.display = "block";
                    deleteButton.style.display = "block";
                }
            </script>


            </div>
            </div>
          </div>
        </div>
   </div>

    <form id="status-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
                STATUS
          </h3>
        </div>
        <div class="card-body pad table-responsive">
        <div class="container"><h2>Edit Project Status</h2>



        </div>
        </div>
      </div>
    </div>
    </form>

    <form id="reviewer-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
                REVIEWER
          </h3>
        </div>
        <div class="card-body pad table-responsive">
        <div class="container">
            <h2>Select Reviewers</h2>




        </div>
        </div>
      </div>
    </div>
    </form>

    <form id="cash-program-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
                CASH PROGRAM
          </h3>
        </div>
        <div class="card-body pad table-responsive">


        </div>
      </div>
    </div>
    </form>

    <form id="reprogramming-status-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
                REPROGRAMMING STATUS
          </h3>
        </div>
        <div class="card-body pad table-responsive">


        </div>
      </div>
    </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script>
    $(document).ready(function() {
      // Button click event handlers
      $('#details-btn').click(function() {
        $('#details-form').show();
        $('#status-form, #reviewer-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      $('#status-btn').click(function() {
        $('#status-form').show();
        $('#details-form, #reviewer-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

        $('#reviewer-btn').click(function() {
        $('#reviewer-form').show();
        $('#status-form, #details-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
        });

      $('#files-btn').click(function() {
        $('#files-form').show();
        $('#details-form, #reviewer-form, #status-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      $('#messages-btn').click(function() {
        $('#messages-form').show();
        $('#details-form, #reviewer-form, #status-form, #files-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      // Add event handlers for other buttons here

      $('#actions-btn').click(function() {
        $('#actions-form').show();
        $('#details-form, #reviewer-form, #status-form, #files-form, #messages-form, #lib-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      $('#lib-btn').click(function() {
        $('#lib-form').show();
        $('#details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      $('#classifications-btn').click(function() {
        $('#classifications-form').show();
        $('#details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      $('#project-team-btn').click(function() {
        $('#project-team-form').show();
        $('#details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      $('#cash-program-btn').click(function() {
        $('#cash-program-form').show();
        $('#details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #project-team-form, #reprogramming-status-form').hide();
      });

      $('#reprogramming-status-btn').click(function() {
        $('#reprogramming-status-form').show();
        $('#details-form, #status-form, #reviewer-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #project-team-form, #cash-program-form').hide();
      });
    });

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

  </div>
  <!-- @include('layouts.footer') -->
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>





</body>
</html>
  
  






  @endsection
