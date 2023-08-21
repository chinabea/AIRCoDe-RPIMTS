@extends('layouts.template')
@section('title', 'Make Recommendations, Suggestions and Comments')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
    </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                
                                <div class="page-break"></div>
                                
                                <div style="text-align: center;">
                                    <h1>Chapter 2</h1>
                                    <h1>REVIEW OF RELATED LITERATURE AND SYSTEMS </h1>
                                </div>

                                <h2>Project Name</h2>
                                    <p>{{ $data->projname }}</p>

                                <h2>Status</h2>
                                    <p>{{ $data->status }}</p>

                                <h2>Research Group</h2>
                                    <p>{{ $data->researchgroup }}</p>

                                <h2>Author(s)</h2>
                                    <p>{{ $data->authors }}</p>

                                <h2>Introduction</h2>
                                    <p>{{ $data->introduction }}</p>

                                <h2>Aims and Objectives</h2>
                                    <p>{{ $data->aims_and_objectives }}</p>

                                <h2>Background</h2>
                                    <p>{{ $data->background }}</p>

                                <h2>Expected Research Contribution</h2>
                                    <p>{{ $data->expected_research_contribution }}</p>

                                <h2>The Proposed Methodology</h2>
                                    <p>{{ $data->proposed_methodology }}</p>

                                <h2>Start Date</h2>
                                    <p>{{ $data->start_date }}</p>

                                <h2>End Date</h2>
                                    <p>{{ $data->end_date }}</p>

                                <h2>Work Plan</h2>
                                    <p>{{ $data->workplan }}</p>

                                <h2>Resources</h2>
                                    <p>{{ $data->resources }}</p>

                                <h2>References</h2>
                                    <p>{{ $data->references }}</p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
  </div>
@endsection
