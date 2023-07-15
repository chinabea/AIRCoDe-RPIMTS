
@extends('layouts.template')
@section('title', 'Blank')

<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('layouts.topnav')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Blank Page</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">404</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">

    <form action="{{ route('proponents.projects.storeReviewer') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="projname">Project Title</label>
            <input type="text" name="projname" id="projname" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="reviewers">Project Reviewers</label>
            <select name="reviewers[]" id="reviewers" class="form-control custom-select" multiple>
                <option disabled>Select reviewers</option>
                @foreach ($reviewers as $reviewer)
                    <option value="{{ $reviewer->id }}" data-project-id="{{ $reviewer->project_id }}">{{ $reviewer->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Project</button>
    </form>

    </section>
  </div>
  @include('layouts.footer')
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
