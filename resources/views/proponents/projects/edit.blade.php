@extends('layouts.template')
@section('title', 'Create projects')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('layouts.topnav')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Create New projects</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li> --}}
              </ol>
            </div>
          </div>
        </div>
      </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">General</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <form action="{{ route('proponents.projects.edit', $projects->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label for="projname">Projects Name</label>
                      <input type="text" id="projname" name="projname" class="form-control"
                      value="{{ $projects->projname }}">
                    </div>
                    <!-- ======================== -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" id="status" name="status" class="form-control" value="{{ $projects->status }}">
                    </div>

                    <div class="form-group">
                        <label for="update_status">Update Status:</label>
                        <select name="update_status" id="update_status" class="form-control">
                            <option value="draft" {{ $projects->status == 'draft' ? 'selected' : '' }}>draft</option>
                            <option value="under_evaluation" {{ $projects->status == 'under_evaluation' ? 'selected' : '' }}>under_evaluation</option>
                            <option value="for_revision" {{ $projects->status == 'for_revision' ? 'selected' : '' }}>for_revision</option>
                            <option value="approved" {{ $projects->status == 'approved' ? 'selected' : '' }}>approved</option>
                            <option value="deferred" {{ $projects->status == 'deferred' ? 'selected' : '' }}>deferred</option>
                            <option value="disapproved" {{ $projects->status == 'disapproved' ? 'selected' : '' }}>disapproved</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="researchgroup">Research Group</label>
                      <input type="text" id="researchgroup" name="researchgroup" class="form-control"
                      value="{{ $projects->researchgroup }}">
                    </div>
                    <div class="form-group">
                      <label for="authors">Author(s)</label>
                      <input type="text" id="authors" name="authors" class="form-control"
                      value="{{ $projects->authors }}">
                    </div>
                    <div class="form-group">
                      <label for="introduction">Introduction</label>
                      <input  id="introduction" name="introduction" class="form-control" rows="4"
                      value="{{ $projects->introduction }}">
                    </div>
                    <div class="form-group">
                      <label for="aims_and_objectives">Aims and Objectives</label>
                      <input  id="aims_and_objectives" name="aims_and_objectives" class="form-control" rows="4"
                      value="{{ $projects->aims_and_objectives }}">
                    </div>
                    <div class="form-group">
                      <label for="background">Background</label>
                      <input  id="background" name="background" class="form-control" rows="4"
                      value="{{ $projects->background }}">
                    </div>
                    <div class="form-group">
                      <label for="expected_research_contribution">Expected Research Contribution</label>
                      <input  id="expected_research_contribution" name="expected_research_contribution" class="form-control" rows="4"
                      value="{{ $projects->expected_research_contribution }}">
                    </div>
                    <div class="form-group">
                      <label for="proposed_methodology">The Proposed Methodology</label>
                      <input  class="form-control" rows="4"
                      value="{{ $projects->proposed_methodology }}"
                      id="proposed_methodology" name="proposed_methodology">
                    </div>
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date"  value="{{ $projects->start_date }}">
                    <!-- <input type="submit"> -->
                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date"  value="{{ $projects->end_date }}">
                    <!-- <input type="submit"> -->
                    <div class="form-group">
                        <label>Work Plan:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control float-right" id="reservation" name="reservation"
                          value="{{ $projects->projname }}">
                        </div>
                    <div class="form-group">
                        <label>Work Plan:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control float-right" id="workplan" name="workplan"
                          value="{{ $projects->workplan }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Resources</label>
                        <input  class="form-control" rows="4"
                        value="{{ $projects->resources }}"
                        id="resources" name="resources">
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Referencences</label>
                        <input  id="references"  name="references" class="form-control" rows="4"
                        value="{{ $projects->references }}">
                      </div>
                      <a href="#" class="btn btn-secondary">Cancel</a>
                      <input type="submit" value="Update Project" class="btn btn-warning float-right">
                  </div>
            </form>
            </div>
          </div>
        </div>
      </section>

  </div>
    @include('layouts.footer')
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
</body>
</html>





























