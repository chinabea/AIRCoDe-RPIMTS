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
<section class="content">

      <!-- Default box -->
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
                      <!-- /.user-block -->
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
                      <!-- /.user-block -->
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
                      <!-- /.user-block -->
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
                <p class="text-sm">Status:
                  <b class="d-block"> {{ $projects->status }}</b>
                </p>
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
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>

  </div>
  @include('layouts.footer')
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
</body>
</html>


<!DOCTYPE html>
<html>

<head>
    <title>Research Project Details</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-4">Research Project: projname</h1>

        <div class="row">
            <div class="col-md-6">
                <h4>Status: status</h4>
                <p><strong>Research Group: </strong> researchgroup</p>
                <p><strong>Authors: </strong> authors</p>
                <p><strong>Start Date: </strong> start_date</p>
                <p><strong>End Date: </strong> end_date</p>
            </div>
        </div>

        <hr>

        <h4>Introduction</h4>
        <p>introduction</p>

        <h4>Aims and Objectives</h4>
        <p>aims_and_objectives</p>

        <h4>Background</h4>
        <p>background</p>

        <h4>Expected Research Contribution</h4>
        <p>expected_research_contribution</p>

        <h4>Proposed Methodology</h4>
        <p>proposed_methodology</p>

        <h4>Workplan</h4>
        <p>workplan</p>

        <h4>Resources</h4>
        <p>resources</p>

        <h4>References</h4>
        <p>references</p>
    </div>

    <!-- Add Bootstrap JS and jQuery scripts here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Research Detail</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Add custom styles here */
    </style>
</head>

<body>
    <div class="container">
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Project Research Detail</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Project Information</h4>
                            <p><strong>Project Name:</strong> {{ $projects->projname }}</p>
                            <p><strong>Status:</strong> {{ $projects->status }}</p>
                            <p><strong>Research Group:</strong> {{ $projects->researchgroup }}</p>
                            <p><strong>Authors:</strong> {{ $projects->authors }}</p>
                            <p><strong>Start Date:</strong> {{ $projects->start_date }}</p>
                            <p><strong>End Date:</strong> {{ $projects->end_date }}</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Project Description</h4>
                            <p><strong>Introduction:</strong></p>
                            <p>{{ $projects->introduction }}</p>
                            <p><strong>Aims and Objectives:</strong></p>
                            <p>{{ $projects->aims_and_objectives }}</p>
                            <p><strong>Background:</strong></p>
                            <p>{{ $projects->background }}</p>
                            <p><strong>Expected Research Contribution:</strong></p>
                            <p>{{ $projects->expected_research_contribution }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Methodology</h4>
                            <p>{{ $projects->proposed_methodology }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Workplan</h4>
                            <p>{{$projects->workplan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Resources</h4>
                            <p>{{ $projects->resources }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>References</h4>
                            <p>{{ $projects->references }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->

        </section>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
