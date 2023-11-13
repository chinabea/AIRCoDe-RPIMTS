@extends('layouts.template')

@section('content')

  <div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-center align-items-center">
              <!-- <i class="nav-icon fas fa-book fa-2x"></i> -->
                <h6 class="m-0 ml-3 font-weight-bold">SUBMITTED PROJECTS</h6>
            </div>

            <div class="card-body">
<form action="{{ route('projects.edit', $records->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="project_name" class="form-label">Project Name</label>
      <input type="text" value="{{ $records->project_name }}" class="form-control" id="project_name" name="project_name">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Research Group</label>
      <input type="text" value="{{ $records->research_group }}" class="form-control" id="research_group" name="research_group">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Introduction</label>
      <input type="text" value="{{ $records->introduction }}" class="form-control" id="introduction" name="introduction">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Aims and Objectives</label>
      <input type="text" value="{{ $records->aims_and_objectives }}" class="form-control" id="aims_and_objectives" name="aims_and_objectives">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Background</label>
      <input type="text" value="{{ $records->background }}" class="form-control" id="background" name="background">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Expected Research Contribution</label>
      <input type="text" value="{{ $records->expected_research_contribution }}" class="form-control" id="expected_research_contribution" name="expected_research_contribution">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">The Proposed Methodology</label>
      <input type="text" value="{{ $records->proposed_methodology }}" class="form-control" id="proposed_methodology" name="proposed_methodology">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Work Plan</label>
      <input type="text" value="{{ $records->workplan }}" class="form-control" id="workplan" name="workplan" readonly>
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Resources</label>
      <input type="text" value="{{ $records->resources }}" class="form-control" id="resources" name="resources">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">References</label>
      <input type="text" value="{{ $records->references }}" class="form-control" id="references" name="references">
    </div>
</div>
    <div class="card-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning float-right">Update Proposal</button>
    </div>
  </form>
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
</div>
</div>
</div>
@endsection
