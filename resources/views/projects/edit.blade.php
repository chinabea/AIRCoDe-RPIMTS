@extends('layouts.template') 

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
      </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header py-3 d-flex justify-content-center align-items-center">
                    <i class="fas fa-file-signature fa-2x text-gray-300"></i>
                    <h1 class="m-0 ml-3 font-weight-bold">Research Project Form</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('project.updateDraft', $records->id) }}" method="POST" id="updateproject">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">

                        <div class="mb-3">
                            <label for="tracking_code" class="form-label">Tracking Code</label>
                            <input type="text" value="{{ $records->tracking_code }}" class="form-control"
                                id="tracking_code" name="tracking_code" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="project_name" class="form-label">Project Name</label>
                            <input type="text" value="{{ $records->project_name }}" class="form-control"
                                id="project_name" name="project_name">
                        </div>

                        <div class="mb-3">
                            <label for="research_group" class="form-label">Research Group</label>
                            <textarea class="form-control" id="research_group" name="research_group">{!! $records->research_group !!}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Introduction</label>
                            <textarea type="text" class="form-control" id="introduction" name="introduction">{!! $records->introduction !!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Aims and Objectives</label>
                            <textarea type="text" class="form-control" id="aims_and_objectives" name="aims_and_objectives">{!! $records->aims_and_objectives !!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Background</label>
                            <textarea type="text" class="form-control" id="background" name="background">{!! $records->background !!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Expected Research Contribution</label>
                            <textarea type="text" class="form-control" id="expected_research_contribution" name="expected_research_contribution">{!! $records->expected_research_contribution !!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">The Proposed Methodology</label>
                            <textarea type="text" class="form-control" id="proposed_methodology" name="proposed_methodology">{!! $records->proposed_methodology !!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Work Plan</label>
                            <textarea type="text" class="form-control" id="workplan" name="workplan">{!! $records->workplan !!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Resources</label>
                            <textarea type="text" class="form-control" id="resources" name="resources">{!! $records->resources !!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">References</label>
                            <textarea type="text" class="form-control" id="references" name="references">{!! $records->references !!}</textarea>
                        </div>
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-lg-6">
                                <div class="btn-group w-100">
                                    <button type="submit" class="btn btn-success col start" name="draft_submit">
                                        <i class="fas fa-plus"></i>
                                        <span>Draft</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary col start" name="submit_project">
                                        <i class="fas fa-upload"></i>
                                        <span>Submit</span>
                                    </button>
                                    <button type="reset" class="btn btn-warning col cancel" name="cancel">
                                        <i class="fas fa-times-circle"></i>
                                        <span>Cancel</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </section>
</div>

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

@endsection

