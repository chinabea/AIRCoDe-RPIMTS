
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
                    <form action="{{ route('projects.store') }}" method="POST" id="project"
                        enctype="multipart/form-data">
                        {{ method_field('POST') }}
                        @csrf

                        <div class="form-group">
                            <label for="call_for_proposal_id">Select Call for Proposal</label>
                            <select id="call_for_proposal_id" name="call_for_proposal_id"
                                class="selectpicker form-control" data-live-search="true">
                                <option value="" disabled selected>Select Call for Proposal</option>
                                @foreach ($call_for_proposals as $call_for_proposal)
                                    @if ($call_for_proposal->start_date <= now() && $call_for_proposal->end_date >= now())
                                        <option value="{{ $call_for_proposal->id }}">{{ $call_for_proposal->title }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <small class="text-muted">Reminder: Ensure that the submission of other relevant
                                requirements is completed while the Call for Proposal is open.
                                Submission will close when the Call for Proposal status is closed.</small>
                        </div>

                        <div class="form-group">
                            <label for="project_name">Project Title</label>
                            <textarea id="project_name" name="project_name" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="research_group">Research Group</label>
                            <textarea id="research_group" name="research_group" class="form-control"></textarea>
                        </div>

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

                        <div class="form-group">
                            <label for="resources">Resources</label>
                            <textarea class="form-control" id="resources" name="resources"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="references">References</label>
                            <textarea id="references" name="references" class="form-control"></textarea>
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
