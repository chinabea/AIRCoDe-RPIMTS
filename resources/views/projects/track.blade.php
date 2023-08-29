
@extends('layouts.template')
@section('title', 'Track')

@section('content')

  <div class="content-wrapper">
    <section class="content-header">
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container mt-5">
            <div class="card">
              <div class="card-header clearfix">
                <h3>Track Submission Status</h3>
              </div>
              <div class="card-body">
              <div class="table-responsive">
                <form action="{{ route('projects.track') }}" method="get">
                    <div class="form-group">
                        <label for="proj_id">Tracking ID:</label>
                        <input type="text" id="proj_id" name="proj_id" placeholder="Enter ID" required>
                        <small class="form-text text-muted">
                            <!-- <b>Note:</b> Your Tracking ID was sent to your registered email upon acknowledging receipt of your proposal. -->
                        </small>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Search</button>
                </form>
                @if(isset($project))
                    @if($project)
                        <div>
                            <h2>Project Found:</h2>
                            <p>Project Title: {{ $project->projname }}</p>
                            <!-- <p>Approved: approved date here...</p> -->
                        </div>
                    @else
                        <p>No project found with the entered ID.</p>
                    @endif
                @endif
              </div>
            </div>

            <div class="card-footer clearfix">
            </div>


          </div>
        </div>
      </div>
    </section>
  </div>
  </div>


  @endsection
