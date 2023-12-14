
@extends('layouts.template')

@section('content')


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

@php
    $role = auth()->user()->role;
@endphp

@if($role === 1)
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="#" class="d-none d-sm-inline-block btn btn-sm bg-navy color-palette shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>{{ $allProjectsCount }}</h3>

                <p>Submitted Projects</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="{{ route('projects') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $allUnderEvaluationCount }}</h3>

                <p>Under Evaluation</p>
              </div>
              <div class="icon">
                <i class="fas fa-hourglass-half nav-icon"></i>
              </div>
              <a href="{{ route('status.under-evaluation') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $allForRevisionCount }}</h3>

                <p>For Revision</p>
              </div>
              <div class="icon">
                <i class="fas fa-edit nav-icon"></i>
              </div>
              <a href="{{ route('status.for-revision') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $allDeferredCount }}</h3>

                <p>Deferred</p>
              </div>
              <div class="icon">
                <i class="fas fa-pause-circle nav-icon"></i>
              </div>
              <a href="{{ route('status.deferred') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $allApprovedCount }}</h3>

                <p>Approved</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="{{ route('status.approved') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $allDisapprovedCount }}</h3>

                <p>Disapproved</p>
              </div>
              <div class="icon">
                <i class="far fa-times-circle nav-icon"></i>
              </div>
              <a href="{{ route('status.disapproved') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-orange">
              <div class="inner">
                <h3>{{ $allCallforProposalCount }}</h3>

                <p>Call for Proposals NA</p>
              </div>
              <div class="icon">
                <i class="fas fa-edit nav-icon"></i>
              </div>
              <a href="{{ route('status.for-revision') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-pink">
              <div class="inner">
                <h3>{{ $allAccessRequestCount }}</h3>

                <p>Access Requests</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-key"></i>
              </div>
              <a href="{{ route('status.deferred') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>{{ $allUsersCount }}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="{{ route('users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@elseif($role === 2)

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="#" class="d-none d-sm-inline-block btn btn-sm bg-navy color-palette shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>{{ $allProjectsCount }}</h3>

                <p>Submitted Projects</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="{{ route('projects') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $allUnderEvaluationCount }}</h3>

                <p>Under Evaluation</p>
              </div>
              <div class="icon">
                <i class="fas fa-hourglass-half nav-icon"></i>
              </div>
              <a href="{{ route('status.under-evaluation') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $countOfReviewsWithTwoComments }}</h3>

                <p>For Review Summary</p>
              </div>
              <div class="icon">
                <i class="fas fa-edit nav-icon"></i>
              </div>
              <a href="{{ route('status.for-revision') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $allDeferredCount }}</h3>

                <p>Deferred</p>
              </div>
              <div class="icon">
                <i class="fas fa-pause-circle nav-icon"></i>
              </div>
              <a href="{{ route('status.deferred') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $allApprovedCount }}</h3>

                <p>Approved</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="{{ route('status.approved') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $allDisapprovedCount }}</h3>

                <p>Disapproved</p>
              </div>
              <div class="icon">
                <i class="far fa-times-circle nav-icon"></i>
              </div>
              <a href="{{ route('status.disapproved') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-pink">
              <div class="inner">
                <h3>{{ $allAccessRequestCount }}</h3>

                <p>Access Requests</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-key"></i>
              </div>
              <a href="{{ route('status.deferred') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-fuchsia">
              <div class="inner">
                <h3>{{ $allUsersCount }}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="{{ route('users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@elseif($role === 3)


<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="#" class="d-none d-sm-inline-block btn btn-sm bg-navy color-palette shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>{{ $projectCount }}</h3>

                <p>Submitted Projects</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="{{ route('projects') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-maroon">
              <div class="inner">
                <h3>{{ $draftCount }}</h3>

                <p>Draft NA</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="{{ route('projects') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $underEvaluationCount }}</h3>

                <p>Under Evaluation</p>
              </div>
              <div class="icon">
                <i class="fas fa-hourglass-half nav-icon"></i>
              </div>
              <a href="{{ route('status.under-evaluation') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $forRevisionCount }}</h3>

                <p>For Revision</p>
              </div>
              <div class="icon">
                <i class="fas fa-edit nav-icon"></i>
              </div>
              <a href="{{ route('status.for-revision') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $approvedCount }}</h3>

                <p>Approved</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="{{ route('status.approved') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $disapprovedCount }}</h3>

                <p>Disapproved</p>
              </div>
              <div class="icon">
                <i class="far fa-times-circle nav-icon"></i>
              </div>
              <a href="{{ route('status.disapproved') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-pink">
              <div class="inner">
                <h3>{{ $allAccessRequestCount }}</h3>

                <p>Access Requests NA</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-key"></i>
              </div>
              <a href="{{ route('status.deferred') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-fuchsia">
              <div class="inner">
                <h3>{{ $allUsersCount }}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="{{ route('users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                Call for Proposals
              </div>
              <div class="card-body">
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
                      @if ($records->count() > 0)
                          @foreach ($records as $proposal)
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
    </div>
  </section>
</div>


@elseif($role === 4)

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="#" class="d-none d-sm-inline-block btn btn-sm bg-navy color-palette shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>{{ $allProjectsCount }}</h3>

                <p>Submitted Projects</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="{{ route('projects') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $allUnderEvaluationCount }}</h3>

                <p>Under Evaluation</p>
              </div>
              <div class="icon">
                <i class="fas fa-hourglass-half nav-icon"></i>
              </div>
              <a href="{{ route('status.under-evaluation') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $countOfReviewsWithTwoComments }}</h3>

                <p>For Review Summary</p>
              </div>
              <div class="icon">
                <i class="fas fa-edit nav-icon"></i>
              </div>
              <a href="{{ route('status.for-revision') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $allDeferredCount }}</h3>

                <p>Deferred</p>
              </div>
              <div class="icon">
                <i class="fas fa-pause-circle nav-icon"></i>
              </div>
              <a href="{{ route('status.deferred') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $allApprovedCount }}</h3>

                <p>Approved</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="{{ route('status.approved') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $allDisapprovedCount }}</h3>

                <p>Disapproved</p>
              </div>
              <div class="icon">
                <i class="far fa-times-circle nav-icon"></i>
              </div>
              <a href="{{ route('status.disapproved') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-pink">
              <div class="inner">
                <h3>{{ $allAccessRequestCount }}</h3>

                <p>Access Requests</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-key"></i>
              </div>
              <a href="{{ route('status.deferred') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-fuchsia">
              <div class="inner">
                <h3>{{ $allUsersCount }}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="{{ route('users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>



























<!-- <div class="content-wrapper">
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


          <div class="clearfix hidden-md-up"></div>

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
</div> -->



@endif
@endsection
