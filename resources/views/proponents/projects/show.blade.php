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
<!-- <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Project Information</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated budget</span>
                      <span class="info-box-number text-center text-muted mb-0">2300</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total amount spent</span>
                      <span class="info-box-number text-center text-muted mb-0">2000</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated project duration</span>
                      <span class="info-box-number text-center text-muted mb-0">20</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Recent Activity</h4>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                        </span>
                        <span class="description">Shared publicly - 7:45 PM today</span>
                      </div>
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                      </p>
                    </div>

                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>
                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 2</a>
                      </p>
                    </div>

                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                        </span>
                        <span class="description">Shared publicly - 5 days ago</span>
                      </div>
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v1</a>
                      </p>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{ $projects->projname }}</h3>
              <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
              <br>

              <div class="text-muted">
                
                <p class="text-sm">Research Group:
                  <b class="d-block"> {{ $projects->researchgroup }}</b>
                </p>
                <p class="text-sm">Authors:
                  <b class="d-block">{{ $projects->authors }}</b>
                </p>
                <p class="text-sm">Start Date:
                  <b class="d-block">{{ \Carbon\Carbon::parse($projects->start_date)->format('F d, Y') }}</b>
                </p>
                <p class="text-sm">End Date:
                  <b class="d-block">{{ \Carbon\Carbon::parse($projects->end_date)->format('F d, Y') }}</b>
                </p>
              </div>
              <h5 class="mt-5 text-muted">Project files</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section> -->

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
                        <td class="text-left">Larry the Bird</td>
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














































  </div>
  @include('layouts.footer')
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
</body>
</html>
