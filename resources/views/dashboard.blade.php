
@extends('layouts.template')
@section('title', 'Dashboard')

@section('content')

@php
    $role = auth()->user()->role;
@endphp

@if($role === 1)
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="container mt-5">
        <h2>Dashboard</h2>
     <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('users') }}" class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">25</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Submitted Projects</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">6</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

@elseif($role === 2)
<style>
    .custom-button-link {
        text-decoration: none; /* Remove underline */
        color: initial; /* Use default text color */
    }
    .custom-button-link:hover {
        color: initial; /* Use default text color on hover */
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="container mt-5">
        <h2>Dashboard</h2>
     <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.draft') }}" class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Draft</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $draftCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Under Evaluation</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $underEvaluationCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                For Revision</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $forRevisionCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-edit fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Approved</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $approvedCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Deferred</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $deferredCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pause-circle fa-2x text-gray-300"></i>
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
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Disapproved</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $disapprovedCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    </div>

@elseif($role === 3)

<style>
    .custom-button-link {
        text-decoration: none; /* Remove underline */
        color: initial; /* Use default text color */
    }
    .custom-button-link:hover {
        color: initial; /* Use default text color on hover */
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="container mt-5">
        <h2>Dashboard</h2>
     <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.draft') }}" class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Draft</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $draftCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Under Evaluation</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $underEvaluationCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                For Revision</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $forRevisionCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-edit fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Approved</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $approvedCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Deferred</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $deferredCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pause-circle fa-2x text-gray-300"></i>
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
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Disapproved</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $disapprovedCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
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
@elseif($role === 4)
<style>
    .custom-button-link {
        text-decoration: none; /* Remove underline */
        color: initial; /* Use default text color */
    }
    .custom-button-link:hover {
        color: initial; /* Use default text color on hover */
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="container mt-5">
        <h2>Dashboard</h2>
     <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('status.under-evaluation') }}" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                For Review</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $underEvaluationCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Approved</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $approvedCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
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
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Disapproved</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $disapprovedCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    </div>

@endif



@endsection
