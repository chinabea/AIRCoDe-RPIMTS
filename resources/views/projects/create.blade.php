
@extends('layouts.template') 

@section('content')

<div class="content-wrapper">
  <!-- <section class="content-header">
  </section> -->

    <div class="container mt-5">

        <!-- <h1>Notifications</h1> -->
                                    <h1>Research Project Form</h1>
                                    <p>Please fill in the following information:</p>

        <div class="card">
            <div class="card-body">
                                    <form action="{{ route('projects.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        {{ method_field('POST') }}
                                        @csrf
                                        <div class="form-group">
                                            <label for="projname">Project Title</label>
                                            <input type="text" id="projname" name="projname" class="form-control"
                                                {{-- placeholder="Working title for the project" --}}>
                                        </div>

                                        <div class="form-group">
                                            <label for="researchgroup">Research Group</label>
                                            <input type="text" id="researchgroup" name="researchgroup"
                                                class="form-control" {{-- placeholder="Name of research group" --}}>
                                        </div>

                                        <div class="form-group">
                                            <label for="authors">Author(s)</label>
                                            <input type="text" id="authors" name="authors" class="form-control"
                                                {{-- placeholder="Names of Author" --}}>
                                        </div>

                                        <div class="form-group">
                                            <label for="introduction">Introduction</label>
                                            <textarea id="introduction" name="introduction" class="form-control"
                                                rows="4" {{-- placeholder="Briefly describe the key aspects of what you will be investigating." --}}></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="aims_and_objectives">Aims and Objectives</label>
                                            <textarea id="aims_and_objectives" name="aims_and_objectives"
                                                class="form-control" rows="4" {{-- placeholder="What are the overall aims of the work? What objectives are necessary to meet the aims?" --}}></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="background">Background</label>
                                            <textarea id="background" name="background" class="form-control" rows="4"></textarea>
                                            {{-- placeholder="Brief review of literature in the area of interest. Describe what research lyas in the groundwork for your topic." --}}
                                        </div>

                                        <div class="form-group">
                                            <label for="expected_research_contribution">Expected Research Contribution</label>
                                            <textarea id="expected_research_contribution" name="expected_research_contribution" class="form-control" rows="4"></textarea>
                                            {{-- placeholder="Why is the topi/creative work important? Describe how the research may be novel and it's impact on the descipline." --}}
                                        </div>

                                        <div class="form-group">
                                            <label for="proposed_methodology">The Proposed Methodology</label>
                                            <textarea id="proposed_methodology" name="proposed_methodology" class="form-control" rows="4"></textarea>
                                            {{-- placeholder="Approach or methodology to be used in the research, the materials/equipment you intend to use, your space/laboratory/studio requirements." --}}
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="workplan" class="form-label">Work Plan</label>
                                            <!-- placeholder="An initial plan for completion with annual milestones (eg. over 3 years)." -->
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
                                        </div>

                                        <div class="form-group">
                                            <label for="resources">Resources</label>
                                            <textarea class="form-control" id="resources" name="resources" rows="4"></textarea>
                                            {{-- placeholder="Provide details of major resources required for you to carry out your research project. What significant resources are required for the success of your proposed projec? (e.g travel, equipment)." --}}
                                        </div>

                                        <div class="form-group">
                                            <label for="references">References</label>
                                            <textarea id="references" name="references" class="form-control" rows="4"></textarea>
                                            {{-- placeholder="A short bibliography of the cited literature." --}}
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="confirmationCheckbox"
                                                required>
                                            <label class="form-check-label"
                                                for="confirmationCheckbox">By submitting this form, you confirm that you have read the AIRCoDe Policy to join and collaborate with the AI Research Center for Community Development to carry out the mission and vision.</label>
                                        </div>
                                        <br><br>
                                        <a href="#" class="btn btn-secondary">Cancel</a>
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
