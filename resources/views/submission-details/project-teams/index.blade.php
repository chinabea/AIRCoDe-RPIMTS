@extends('layouts.template')
@section('title', 'Project Detail')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('layouts.topnav')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Project</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">About Us</li> --}}
            </ol>
          </div>
        </div>
      </div>
    </section>

<!-- Main content -->
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
                        <td class="text-left">{{ $projects->projname }}</td>
                        </tr>
                        <tr>
                        <th scope="row">PROJECT GROUP</th>
                        <td class="text-left">{{ $projects->researchgroup }}</td>
                        </tr>
                        <tr>
                        <th scope="row">STATUS</th>
                        <td class="text-left">{{ $projects->status }}</td>
                        </tr>
                        <tr>
                        <th scope="row">REVIEWERS</th>
                        <td class="text-left">@foreach($reviewers as $reviewer)
                                                <p>{{ $reviewer->name }}</p>
                                            @endforeach
                                          </td>
                        </tr>
                        <tr>
                        <th scope="row">DATE SUBMITTED</th>
                        <td class="text-left">{{ \Carbon\Carbon::parse($projects->created_at)->format('F d, Y') }}</td>
                        </tr>
                        <tr>
                        <th scope="row">LAST UPDATE</th>
                        <td class="text-left">{{ \Carbon\Carbon::parse($projects->updated_at)->format('F d, Y') }}</td>
                        </tr>

                    </tbody>
                </table>
              </div>
            </div>
          </div>

  <div class="col-md-12">
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
    <!-- Form fields go here -->
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
            ACTIONS
          </h3>
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
            <form method="post" action="{{ route('project-teams.store') }}" enctype="multipart/form-data">
              {{ method_field('POST') }}
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="member_name">Name</label>
                  <input type="text" class="form-control" id="member_name" name="member_name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="role">Role</label>
                  <select class="form-control" id="role" name="role">
                    <option disable>Select Role</option>
                    <option>Project Leader</option>
                    <option>Database Designer</option>
                    <option>Network Designer</option>
                    <option>UI Designer</option>
                    <option>Quality Assurance</option>
                    <option>Document Writer</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Add Member</button>
            </form>
            <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                ...
                </div>
            </div>
            </div>
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














































  </div>
  <!-- @include('layouts.footer') -->
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
</body>
</html>
