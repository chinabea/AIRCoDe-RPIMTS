
@extends('layouts.template') 

@section('content')

<div class="content-wrapper">
  <section class="content-header">
  </section>
    <div class="container mt-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-center align-items-center">
                <i class="fas fa-file-signature fa-2x text-gray-300"></i>
                <h1 class="m-0 ml-3 font-weight-bold">Research Project Form</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('projects.store') }}" method="POST"
                    enctype="multipart/form-data">
                    {{ method_field('POST') }}
                    @csrf

                    <div class="form-group">
                        <label for="projname">Project Title</label>
                        <textarea id="projname" name="projname" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="researchgroup">Research Group</label>
                        <textarea id="researchgroup" name="researchgroup" class="form-control"></textarea>
                    </div>

                    <!-- <div class="form-group">
                        <label for="authors">Author(s)</label>
                        <textarea id="authors" name="authors" class="form-control"></textarea>
                    </div> -->

                    <div class="form-group">
                        <label for="introduction">Introduction</label>
                        <textarea id="introduction" name="introduction" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="aims_and_objectives">Aims and Objectives</label>
                        <textarea id="aims_and_objectives" name="aims_and_objectives" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="background">Background</label>
                        <textarea id="background" name="background" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="expected_research_contribution">Expected Research Contribution</label>
                        <textarea id="expected_research_contribution" name="expected_research_contribution" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="proposed_methodology">The Proposed Methodology</label>
                        <textarea id="proposed_methodology" name="proposed_methodology" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="workplan">Workplan</label>
                        <textarea id="workplan" name="workplan" class="form-control"></textarea>
                    </div>
            
                    <!-- <div class="mb-3">
                        <label for="workplan" class="form-label">Work Plan</label>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <p>Start Month and Year</p>
                                <input type="month" id="start_month" name="start_month" class="form-control">
                                <br>
                                @error('start_month')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <p>End Month and Year</p>
                                <input type="month" id="end_month" name="end_month" class="form-control">
                                <br>
                                @error('end_month')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="resources">Resources</label>
                        <textarea class="form-control" id="resources" name="resources"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="references">References</label>
                        <textarea id="references" name="references" class="form-control"></textarea>
                    </div>
                    
                    <!-- <a href="#" class="btn btn-secondary">Cancel</a> -->
                    <button type="submit" class="btn btn-warning" name="draft_submit">
                        <i class="fas fa-save"></i> Save as Draft
                    </button>
                    <button type="submit" class="btn btn-info float-right" name="submit_project">
                        <i class="fas fa-check"></i> Submit Project
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
