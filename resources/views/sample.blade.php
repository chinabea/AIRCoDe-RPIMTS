<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Dynamic Forms</title>
</head>
<body>
    
<div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                  SUBMISSION DETAILS
                </h3>
              </div>
              <div class="card-body pad table-responsive">
                <table class="table table-bordered table-sm text-right">
                    <tbody>
                        <tr>
                        <th scope="row" width="25%">PROJECT TITLE</th>
                        <td class="text-left">Research Project Information Management with Tracking System</td>
                        </tr>
                        <tr>
                        <th scope="row">PROJECT LEADER</th>
                        <td class="text-left">Jacob</td>
                        </tr>
                        <tr>
                        <th scope="row">DATE SUBMITTED</th>
                        <td class="text-left">Larry the Bird</td>
                        </tr>
                        <tr>
                        <th scope="row">LAST UPDATE</th>
                        <td class="text-left">the Bird</td>
                        </tr>

                    </tbody>
                </table>
              </div>
            </div>
          </div>

  <div class="container mt-5">
    <div class="text-center">
      <button id="actions-btn" class="btn btn-primary">Actions</button>
      <button id="details-btn" class="btn btn-primary">Details</button>
      <button id="lib-btn" class="btn btn-primary">Line-Item Budget</button>
      <button id="classifications-btn" class="btn btn-primary">Classifications</button>
      <button id="files-btn" class="btn btn-primary">Files</button>
      <button id="messages-btn" class="btn btn-primary">Messages</button>
      <button id="project-team-btn" class="btn btn-primary">Project Team</button>
      <button id="status-btn" class="btn btn-primary">Status</button>
      <button id="cash-program-btn" class="btn btn-primary">Cash Program</button>
      <button id="reprogramming-status-btn" class="btn btn-primary">Reprogramming Status</button>
    </div>

    <form id="actions-form" class="mt-4" style="display: none;">
    <h3>Actions Form</h3>
    <!-- Form fields go here -->
    </form>

    <form id="details-form" class="mt-4" style="display: none;">
      <h3>Details Form</h3>
      <!-- Form fields go here -->
    </form>

    <form id="lib-form" class="mt-4" style="display: none;">
    <h3>LIB Form</h3>
    <!-- Form fields go here -->
    </form>

    <form id="classifications-form" class="mt-4" style="display: none;">
    <h3>Classifications Form</h3>
    <!-- Form fields go here -->
    </form>

    <form id="files-form" class="mt-4" style="display: none;">
    <h3>Files Form</h3>
    <!-- Form fields go here -->
    </form>

    <form id="messages-form" class="mt-4" style="display: none;">
    <h3>Messages Form</h3>
    <!-- Form fields go here -->
    </form>

    <form id="project-team-form" class="mt-4" style="display: none;">
    <h3>Project Team Form</h3>
    <!-- Form fields go here -->
    </form>

    <form id="status-form" class="mt-4" style="display: none;">
      <h3>Status Form</h3>
      <!-- Form fields go here -->
    </form>

    <form id="cash-program-form" class="mt-4" style="display: none;">
    <h3>Cash Program Form</h3>
    <!-- Form fields go here -->
    </form>

    <form id="reprogramming-status-form" class="mt-4" style="display: none;">
    <h3>Reprogramming Status Form</h3>
    <!-- Form fields go here -->
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script>
    $(document).ready(function() {
      // Button click event handlers
      $('#details-btn').click(function() {
        $('#details-form').show();
        $('#status-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      $('#status-btn').click(function() {
        $('#status-form').show();
        $('#details-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      $('#files-btn').click(function() {
        $('#files-form').show();
        $('#details-form, #status-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      $('#messages-btn').click(function() {
        $('#messages-form').show();
        $('#details-form, #status-form, #files-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      // Add event handlers for other buttons here

      $('#actions-btn').click(function() {
        $('#actions-form').show();
        $('#details-form, #status-form, #files-form, #messages-form, #lib-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      $('#lib-btn').click(function() {
        $('#lib-form').show();
        $('#details-form, #status-form, #files-form, #messages-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      $('#classifications-btn').click(function() {
        $('#classifications-form').show();
        $('#details-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      $('#project-team-btn').click(function() {
        $('#project-team-form').show();
        $('#details-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #cash-program-form, #reprogramming-status-form').hide();
      });

      $('#cash-program-btn').click(function() {
        $('#cash-program-form').show();
        $('#details-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #project-team-form, #reprogramming-status-form').hide();
      });

      $('#reprogramming-status-btn').click(function() {
        $('#reprogramming-status-form').show();
        $('#details-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #project-team-form, #cash-program-form').hide();
      });
    });
  </script>
</body>
</html>
