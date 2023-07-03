@foreach ($reviewers as $reviewer)
    <p>{{ $reviewer->name }}</p>
@endforeach

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Project Details</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="projname">Project Name</label>
                <input type="text" id="projname" name="projname" class="form-control" value="{{ $project->projname }}" readonly>
            </div>
            <div class="form-group">
                <label for="interviewer">Interviewer</label>
                <input type="text" id="interviewer" name="interviewer" class="form-control" value="{{ $interviewer->name }}" readonly>
            </div>
            <!-- Add more project details here as needed -->
        </div>
    </div>
</section>


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#interviewerModal">
    Select Interviewer
  </button>
  <div class="modal fade" id="interviewerModal" tabindex="-1" role="dialog" aria-labelledby="interviewerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="interviewerModalLabel">Select Reviewer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Display a list of available interviewers -->
          <ul class="list-group">
            @foreach ($reviewers as $reviewer)
              <li class="list-group-item">
                <input type="radio" name="interviewer" value="{{ $reviewer->id }}">
                {{ $reviewer->name }}
              </li>
            @endforeach
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
