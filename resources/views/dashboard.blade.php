
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


<div class="container mt-5">
    <h2>Dashboard</h2>
 <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                            Draft</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-alt fa-2x text-gray-300"></i>
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
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Under Evaluation</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
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
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            For Revision</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-edit fa-2x text-gray-300"></i>
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
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Approved</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
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
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Deferred</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-pause-circle fa-2x text-gray-300"></i>
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
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Disapproved</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

{{-- <div class="container mt-5">
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
                    <span class="fa-angle-left right">Approved</span>
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
</div> --}}


  @endsection
