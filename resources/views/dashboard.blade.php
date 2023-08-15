@extends('layouts.template')
@section('title', 'Dashboard')

@section('content')

  <div class="content-wrapper">
    <section class="content-header">
    </section>
{{--
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header clearfix">
                <h3 class="card-title">DASHBOARD</h3>
              </div>
              <div class="card-body">
              <div class="table-responsive">
                content
              </div>
            </div>

            <div class="card-footer clearfix">

            </div>


          </div>
        </div>
      </div>
    </section>
  </div> --}}

  {{-- <div class="container mt-5">
    <h2>Dashboard</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    Draft
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">$records->projname</li>
                        <li class="list-group-item">Task 2</li>
                        <!-- Add more tasks as needed -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header bg-light">
                    Under Evaluation
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Task 3</li>
                        <li class="list-group-item">Task 4</li>
                        <!-- Add more tasks as needed -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header bg-warning">
                    For Revision
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Task 3</li>
                        <li class="list-group-item">Task 4</li>
                        <!-- Add more tasks as needed -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header bg-info">
                    Approved
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Task 3</li>
                        <li class="list-group-item">Task 4</li>
                        <!-- Add more tasks as needed -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header bg-secondary">
                    Deferred
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Task 3</li>
                        <li class="list-group-item">Task 4</li>
                        <!-- Add more tasks as needed -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header bg-danger text-white">
                    Disapproved
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Task 5</li>
                        <!-- Add more tasks as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
 --}}

<div class="container mt-5">
 <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings (Annual)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container mt-5">
    <h2>Project Status Dashboard</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <i class="far fa-file-alt nav-icon"></i>
                    Draft
                    <h3 class="float-right">10</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Project A</h5>
                    <p class="card-text">Project description goes here...</p>
                    <span class="badge badge-secondary">Draft</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-hourglass-half nav-icon"></i>
                    Under Evaluation
                </div>
                <div class="card-body">
                    <h5 class="card-title">Project B</h5>
                    <p class="card-text">Project description goes here...</p>
                    <span class="badge badge-info">Under Evaluation</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-edit nav-icon"></i>
                    For Revision
                </div>
                <div class="card-body">
                    <h5 class="card-title">Project C</h5>
                    <p class="card-text">Project description goes here...</p>
                    <span class="badge badge-warning">For Revision</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Approved
                </div>
                <div class="card-body">
                    <h5 class="card-title">Project D</h5>
                    <p class="card-text">Project description goes here...</p>
                    <span class="badge badge-success">Approved</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <i class="far fa-pause-circle nav-icon"></i>
                    Deferred
                </div>
                <div class="card-body">
                    <h5 class="card-title">Project E</h5>
                    <p class="card-text">Project description goes here...</p>
                    <span class="badge badge-dark">Deferred</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <i class="far fa-times-circle nav-icon"></i>
                    Disapproved
                </div>
                <div class="card-body">
                    <h5 class="card-title">Project F</h5>
                    <p class="card-text">Project description goes here...</p>
                    <span class="badge badge-danger">Disapproved</span>
                </div>
            </div>
        </div>
    </div>
</div>

















  </div>


  @endsection
