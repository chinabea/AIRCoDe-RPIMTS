
@extends('layouts.template')

@section('content')

@php
    $role = auth()->user()->role;
@endphp

@if($role === 1)
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="container mt-3">
        <h2 class="m-0 font-weight-bold">Dashboard</h2>
     <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.under-evaluation') }}" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-info text-uppercase mb-1">
                                Under Evaluation</div>
                            <div class="badge badge-info text-sm">{{ $allUnderEvaluationCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hourglass-half fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.for-revision') }}" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-warning text-uppercase mb-1">
                                For Revision</div>
                            <div class="badge badge-warning text-sm">{{ $allForRevisionCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-edit fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.approved') }}" class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-success text-uppercase mb-1">
                                Approved</div>
                            <div class="badge badge-success text-sm">{{ $allApprovedCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.deferred') }}" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">
                                Deferred</div>
                            <div class="badge badge-dark text-sm">{{ $allDeferredCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pause-circle fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('status.disapproved') }}" class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold text-danger text-uppercase mb-1">
                            Disapproved</div>
                        <div class="badge badge-danger text-sm">{{ $allDisapprovedCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times-circle fa-3x text-gray-300 custom-button-link"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('users') }}" class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-warning text-uppercase mb-1">
                                Users</div>
                            <div class="badge badge-warning text-sm">{{ $allUsersCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('projects') }}" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-info text-uppercase mb-1">
                                Submitted Projects</div>
                            <div class="badge badge-info text-sm">{{ $allProjectsCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

@elseif($role === 2)
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="container mt-3">
        <h2 class="m-0 font-weight-bold">Dashboard</h2>
        <br>
     <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('projects') }}" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-info text-uppercase mb-1">
                                Submitted Projects</div>
                            <div class="badge badge-info text-sm">{{ $allProjectsCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.under-evaluation') }}" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-info text-uppercase mb-1">
                                Under Evaluation</div>
                            <div class="badge badge-info text-sm">{{ $allUnderEvaluationCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hourglass-half fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.for-revision') }}" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">
                                For Review Summary</div>
                                <span class="badge badge-warning text-sm">{{ $countOfReviewsWithTwoComments }} </span>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-edit fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.approved') }}" class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-success text-uppercase mb-1">
                                Approved</div>
                            <div class="badge badge-success text-smm">{{ $allApprovedCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.deferred') }}" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">
                                Deferred</div>
                            <div class="badge badge-dark text-sm">{{ $allDeferredCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pause-circle fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.disapproved') }}" class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-danger text-uppercase mb-1">
                                Disapproved</div>
                            <div class="badge badge-danger text-sm">{{ $allDisapprovedCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('users') }}" class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-warning text-uppercase mb-1">
                                Users</div>
                            <div class="badge badge-warning text-sm">{{ $allUsersCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

@elseif($role === 3)

<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="container mt-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="m-0 font-weight-bold">Dashboard</h2>

            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
     <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('projects') }}" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-info text-uppercase mb-1">
                                Submitted Projects</div>
                            <div class="badge badge-info text-sm">{{ $projectCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.draft') }}" class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-secondary text-uppercase mb-1">
                                Draft</div>
                            <div class="badge badge-secondary text-sm">{{ $draftCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.under-evaluation') }}" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-info text-uppercase mb-1">
                                Under Evaluation</div>
                            <div class="badge badge-info text-sm">{{ $underEvaluationCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hourglass-half fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.for-revision') }}" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-warning text-uppercase mb-1">
                                For Revision</div>
                            <div class="badge badge-warning text-sm">{{ $forRevisionCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-edit fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.approved') }}" class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-success text-uppercase mb-1">
                                Approved</div>
                            <div class="badge badge-success text-sm">{{ $approvedCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.deferred') }}" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">
                                Deferred</div>
                            <div class="badge badge-dark text-sm">{{ $deferredCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pause-circle fa-3x text-gray-300 custom-button-link"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('status.disapproved') }}" class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold text-danger text-uppercase mb-1">
                            Disapproved</div>
                        <div class="badge badge-danger text-sm">{{ $disapprovedCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times-circle fa-3x text-gray-300 custom-button-link"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>


@elseif($role === 4)
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="container mt-3">
        <h2 class="m-0 font-weight-bold">Dashboard</h2>
        <br>
     <div class="row">

<div class="col-xl-3 col-md-6 mb-4">
    <div class="callout callout-warning shadow h-100 py-2">
        <a href="" class="text-decoration-none">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold text-warning text-uppercase mb-1">
                            For Review
                        </div>
                        <div class="badge badge-warning text-sm">{{ $countOfUnreviewedProjects }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass-half fa-3x text-gray-300 custom-button-link"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>


<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="callout callout-info shadow h-100 py-2">
        <a href="{{ route('status.under-evaluation') }}" class="text-decoration-none">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="font-weight-bold text-info text-uppercase mb-1">
                    Reviewed</div>
                    <div class="badge badge-info text-sm">{{ $assignedAndReviewedCount }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-file-signature fa-3x text-gray-300 custom-button-link"></i>
                </div>
            </div>
        </div>
    </a>
</div>
</div>


<div class="container">
    <h2 class="m-0 font-weight-bold">Review Exceeded Deadlines</h2>
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
                                        <h5 class="deadline-detail m-0 ml-3 font-weight-bold" style="text-decoration: none;">{{ $deadline->project->projname }}</h5>
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
