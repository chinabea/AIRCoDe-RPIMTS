@extends('layouts.template')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Enter Tracking ID</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('projects.track') }}" method="get">
                                <!-- @csrf -->
                                <div class="form-group">
                                    <label for="proj_id">Tracking ID:</label>
                                    <input type="text" id="proj_id" name="proj_id" class="form-control" placeholder="Enter ID" required>
                                    <small class="text-muted">
                                        <b>Note:</b> Your Tracking ID was sent to your registered email upon acknowledging receipt of your proposal.
                                    </small>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Search</button>
                            </form>
                        </div>
                        @if(isset($project))
                            <div class="card-footer">
                                @if($project)
                                    <h4 class="text-success">Project Found:</h4>
                                    <p><strong>Project Title:</strong> {{ $project->projname }}</p>
                                    <p><strong>Approved Date:</strong> {{ $project->approved_date }}</p>
                                @else
                                    <p class="text-danger">No project found with the entered ID.</p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
