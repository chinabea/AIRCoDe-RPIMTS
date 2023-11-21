
@extends('layouts.template')

@section('content')

@php
    $role = auth()->user()->role;
@endphp

@if(session('success'))
    <script>
        toastr.success('{{ session('success') }}');
    </script>
@elseif(session('delete'))
    <script>
        toastr.delete('{{ session('delete') }}');
    </script>
@elseif(session('message'))
    <script>
        toastr.message('{{ session('message') }}');
    </script>
@elseif(session('error'))
    <script>
        toastr.error('{{ session('error') }}');
    </script>
@endif
@if($role === 1)
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="container">
        <h3 class="h3 mb-0 text-gray-800">Dashboard</h3>
     <div class="row">

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-hourglass-half"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Under Evaluation</span>
              <span class="info-box-number">{{ $allUnderEvaluationCount }}</span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-edit"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">For Revision</span>
                <span class="info-box-number">{{ $allForRevisionCount }}</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Approved</span>
                <span class="info-box-number">{{ $allApprovedCount }}</span>
            </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-pause-circle"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Deferred</span>
                <span class="info-box-number">{{ $allDeferredCount }}</span>
            </div>
            </div>
        </div>

      <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times-circle"></i></span>

              <div class="info-box-content">
              <span class="info-box-text">Disapproved</span>
              <span class="info-box-number">{{ $allDisapprovedCount }}</span>
              </div>
          </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
              <span class="info-box-icon bg-maroon elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
              <span class="info-box-text">Users</span>
              <span class="info-box-number">{{ $allUsersCount }}</span>
              </div>
          </div>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-book"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Submitted Projects</span>
            <span class="info-box-number">
            {{ $allProjectsCount }}
            </span>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">New Members</span>
            <span class="info-box-number">2,000</span>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Recap Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <div class="progress-group">
                      Add Products to Cart
                      <span class="float-right"><b>160</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Complete Purchase
                      <span class="float-right"><b>310</b>/400</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Visit Premium Page</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Send Inquiries
                      <span class="float-right"><b>250</b>/500</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL REVENUE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">TOTAL COST</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">GOAL COMPLETIONS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>


@elseif($role === 2)
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="container">
        <h3 class="h3 mb-0 text-gray-800">Dashboard</h3>
        <br>
     <div class="row">

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-maroon elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number">{{ $allUsersCount }}</span>
                </div>
            </div>
        </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Submitted Projects</span>
                <span class="info-box-number">
                {{ $allProjectsCount }}
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-hourglass-half"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Under Evaluation</span>
                <span class="info-box-number">{{ $allUnderEvaluationCount }}</span>
              </div>
            </div>
          </div>

          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-edit"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">For Review Summary</span>
                <span class="info-box-number">{{ $countOfReviewsWithTwoComments }}</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Approved</span>
                <span class="info-box-number">{{ $allApprovedCount }}</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-pause-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Deferred</span>
                <span class="info-box-number">
                {{ $allDeferredCount }}
                </span>
              </div>
            </div>
          </div>

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Disapproved</span>
                <span class="info-box-number">{{ $allDisapprovedCount }}</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
            </div>
          </div>
    </div>
    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Recap Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <div class="progress-group">
                      Add Products to Cart
                      <span class="float-right"><b>160</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Complete Purchase
                      <span class="float-right"><b>310</b>/400</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Visit Premium Page</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Send Inquiries
                      <span class="float-right"><b>250</b>/500</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL REVENUE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">TOTAL COST</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">GOAL COMPLETIONS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>


@elseif($role === 3)

<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h3 mb-0 text-gray-800">Dashboard</h3>

            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
     <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-book"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Submitted Projects</span>
                <span class="info-box-number">
                {{ $projectCount }}
                </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-maroon elevation-1"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Draft</span>
                <span class="info-box-number">
                {{ $draftCount }}
                </span>
                </div>
            </div>
        </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-hourglass-half"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Under Evaluation</span>
                <span class="info-box-number">{{ $underEvaluationCount }}</span>
              </div>
            </div>
          </div>

        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-edit"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">For Revision</span>
                <span class="info-box-number">{{ $forRevisionCount }}</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Approved</span>
                <span class="info-box-number">{{ $approvedCount }}</span>
              </div>
            </div>
          </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-pause-circle"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Deferred</span>
                <span class="info-box-number">
                {{ $deferredCount }}
                </span>
                </div>
            </div>
        </div>

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times-circle"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Disapproved</span>
                <span class="info-box-number">{{ $disapprovedCount }}</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-times-circle"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Access Request</span>
                <span class="info-box-number">{{ $disapprovedCount }}</span>
                </div>
            </div>
        </div>

</div>

<div class="container">
        <h2 class="h3 mb-0 text-gray-800">Call for Proposals</h2>
        <br>
    <div class="card shadow mb-4">
        <div class="card-body">
        <div class="table-responsive">
                <table id="example1" class="table table-bordered table-hover text-center table-sm">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Proposal Title</th>
                          <th>Proposal Description</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Status</th>
                          <th>Remarks</th>
                      </tr>
                  </thead>
                  <tbody>
                        @if($records->count() > 0)
                        @foreach($records as $proposal)
                        <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $proposal->title }}</td>
                        <td class="align-middle">{{ $proposal->description }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($proposal->start_date)->format('F j, Y') }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($proposal->end_date)->format('F j, Y') }}</td>
                        <td class="align-middle">
                            @php
                                $currentDate = now();
                                $startDate = \Carbon\Carbon::parse($proposal->start_date);
                                $endDate = \Carbon\Carbon::parse($proposal->end_date);

                                if ($currentDate >= $startDate && $currentDate <= $endDate) {
                                    echo 'Open';
                                } elseif ($currentDate < $startDate) {
                                    echo 'Opening Soon';
                                } else {
                                    echo 'Closed';
                                }
                            @endphp
                        </td>
                        <td class="align-middle">{{ $proposal->remarks }}</td>
                        </tr>
                        @endforeach
                        @endif
                  </tbody>
              </table>
            </div>
        </div>
    </div>
</div>



@elseif($role === 4)
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="container">
        <h3 class="h3 mb-0 text-gray-800">Dashboard</h3>
        <br>
     <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-edit"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">For Review</span>
                <span class="info-box-number">{{ $countOfUnreviewedProjects }}</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Reviewed</span>
                <span class="info-box-number">{{ $assignedAndReviewedCount }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
            </div>
          </div>

          <div class="clearfix hidden-md-up"></div>

    </div>

    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Recap Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <div class="progress-group">
                      Add Products to Cart
                      <span class="float-right"><b>160</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Complete Purchase
                      <span class="float-right"><b>310</b>/400</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Visit Premium Page</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Send Inquiries
                      <span class="float-right"><b>250</b>/500</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL REVENUE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">TOTAL COST</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">GOAL COMPLETIONS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>


<div class="container">
    <h2 class="h3 mb-0 text-gray-800">Review Exceeded Deadlines</h2>
    <br>
    @foreach($exceededDeadlines as $deadline)
        @if(Auth::check() && Auth::user()->id === $deadline->user_id)
            <div class="card shadow mb-4">
                <div class="collapse show" id="collapseCardExample1">
                    <div class="card-body">
                        <div class="item blinking-alert alert-link">
                            <div class="deadline-item">
                                <div class="deadline-info">
                                    <div class="py-3 d-flex justify-content-center align-items-center" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                                        <i class="fas fa-info-circle fa-3x"></i>
                                        <h5 class="deadline-detail m-0 ml-3 font-weight-bold" style="text-decoration: none;">{{ $deadline->project->project_name }}</h5>
                                    </div>
                                    <div class="deadline-detail font-weight-bold d-flex justify-content-center align-items-center">
                                        Deadline: {{ \Carbon\Carbon::parse($deadline->deadline)->format('F j, Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>



@endif
@endsection
