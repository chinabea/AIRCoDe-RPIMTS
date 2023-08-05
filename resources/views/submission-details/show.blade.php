@extends('layouts.template')
@section('title', 'Dashboard')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
  </section>


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
                        <th scope="row" width="25%">PROJECT ID</th>
                        <td class="text-left">{{ $records->id }}</td>
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
      <button id="reviewer-btn" class="btn btn-primary">Reviewer</button>
      <button id="cash-program-btn" class="btn btn-primary">Cash Program</button>
      <button id="reprogramming-status-btn" class="btn btn-primary">Reprogramming Status</button>
    </div>

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

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ProjectTeam">Add Project Members</button>
                @include('submission-details.project-teams.create')

            <a class="btn btn-primary btn-sm" href="{{ route('submission-details.project-teams.index') }}">Edit</a>
            @include('submission-details.project-teams.modal')

            </div>
            </div>
          </div>
        </div>
   </div>

    <form id="status-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        
    </form>
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
  </script>

  </div>
  </div>
  </div>


  @endsection
