@extends('layouts.template')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
  </section>

<div class="row">

<div class="col-xl-8 col-lg-7">

    <!-- Area Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Research Proposal Reviews</h6>
        </div>
        <div class="card-body">
                <table id="example1" class="table table-bordered table-hover text-left table-sm">
                  <thead class="text-center">
                      <tr>
                          <th>#</th>
                          <th>SECTIONS</th>
                          <th>REVIEWS</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr> 
                        <td class="align-middle">1</td>
                        <th class="align-middle">Does the paper contribute to the body of knowledge?</th>
                          <td class="align-middle">
                            @foreach ($revs as $review) 
                            @if ($review->user->role === 4 && $review->project_id === $records->id)
                            <p><b>{{ $review->user->name }}:</b> {{ $review->contribution_to_knowledge }}</p> 
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">2</td>
                        <th class="align-middle">Is this paper technically sound?</th>
                        <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->technical_soundness }}</p> 
                          @endif
                          @endforeach
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">3</td>
                        <th class="align-middle">Is the subject matter presented in a comprehensive manner?</th>
                        <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->comprehensive_subject_matter }}</p> 
                          @endif
                          @endforeach
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">4</td>
                          <th class="align-middle">Are the references provided applicable and sufficient?</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->applicable_and_sufficient_references }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">5</td>
                          <th class="align-middle">Are there references that are not appropriate for the topic being discussed?</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->inappropriate_references }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">6</td>
                          <th class="align-middle">Is the application comprehensive?</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->comprehensive_application }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">7</td>
                          <th class="align-middle">Is the grammar and presentation poor? Although this should not be heavily waited.</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->grammar_and_presentation }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">8</td>
                          <th class="align-middle">If the submission is very technical, is it because the author has assumed too much of the reader’s knowledge?</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->assumption_of_reader_knowledge }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">9</td>
                          <th class="align-middle">Are figures and tables clear and easy to interpret?</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->clear_figures_and_tables }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">10</td>
                          <th class="align-middle">Are explanations adequate?</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->adequate_explanations }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">11</td>
                          <th class="align-middle">Are there any technical or methodological errors?</th>
                          <td>@foreach ($revs as $review) 
                            @if ($review->user->role === 4 && $review->project_id === $records->id)
                            <p><b>{{ $review->user->name }}:</b> {{ $review->technical_or_methodological_errors }}</p> 
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">12</td>
                          <th class="align-middle">Other Comments</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->other_comments }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">13</td>
                          <th class="align-middle">Review Decision</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->review_decision }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                  </tbody>
              </table>
         
        </div>
    </div>

    <!-- Bar Chart -->
    <!-- <div class="card shadow mb-4">
    </div> -->

</div>

<!-- Donut Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6> -->
          @if(auth()->user()->role == 2)
            <!-- <i class="fas fa-file-signature fa-2x text-gray-300"></i> -->
            <!-- <h5 class="m-0 ml-3 font-weight-bold">SUMMARIZE REVIEWS</h5> -->
            <h6 class="m-0 font-weight-bold text-primary">Summarize Review</h6>
            <input type="hidden" name="project_id" value="{{ $records->id }}">
          @else
            <!-- <i class="fas fa-file-signature fa-2x text-gray-300"></i> -->
            <!-- <h5 class="m-0 ml-3 font-weight-bold">REVIEW</h5> -->
            
            <h6 class="m-0 font-weight-bold text-primary">Review</h6>
          @endif
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <form method="POST" 
            @if(auth()->user()->role == 2)
            action="{{ route('store.summary.reviews', $records->id) }}">
            @csrf
            <input type="hidden" name="project_id" value="{{ $records->id }}">
            @else
            action="{{ route('reviews.storeComments', $records->id) }}">
            @csrf
            @endif
          <div class="form-group">
            <label for="contribution_to_knowledge">1. Does the paper contribute to the body of knowledge?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->contribution_to_knowledge !== null && $review->project_id === $records->id)
                    <textarea id="contribution_to_knowledge" name="contribution_to_knowledge" class="form-control" rows="1" readonly>{{ $review->contribution_to_knowledge }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->contribution_to_knowledge === null && $review->project_id === $records->id)
                    <textarea id="contribution_to_knowledge" name="contribution_to_knowledge" class="form-control" rows="1"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="technical_soundness">2.	Is this paper technically sound?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->technical_soundness !== null && $review->project_id === $records->id)
                    <textarea id="technical_soundness" name="technical_soundness" class="form-control" rows="1" readonly>{{ $review->technical_soundness }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->technical_soundness === null && $review->project_id === $records->id)
                    <textarea id="technical_soundness" name="technical_soundness" class="form-control" rows="1"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="comprehensive_subject_matter">3.	Is the subject matter presented in a comprehensive manner?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->comprehensive_subject_matter !== null && $review->project_id === $records->id)
                    <textarea id="comprehensive_subject_matter" name="comprehensive_subject_matter" class="form-control" rows="1" readonly>{{ $review->comprehensive_subject_matter }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->comprehensive_subject_matter === null && $review->project_id === $records->id)
                    <textarea id="comprehensive_subject_matter" name="comprehensive_subject_matter" class="form-control" rows="1"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="applicable_and_sufficient_references">4.	Are the references provided applicable and sufficient?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->applicable_and_sufficient_references !== null && $review->project_id === $records->id)
                    <textarea id="applicable_and_sufficient_references" name="applicable_and_sufficient_references" class="form-control" rows="1" readonly>{{ $review->applicable_and_sufficient_references }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->applicable_and_sufficient_references === null && $review->project_id === $records->id)
                    <textarea id="applicable_and_sufficient_references" name="applicable_and_sufficient_references" class="form-control" rows="1"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>
          
          <div class="form-group">
            <label for="inappropriate_references">5.	Are there references that are not appropriate for the topic being discussed?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->inappropriate_references !== null && $review->project_id === $records->id)
                    <textarea id="inappropriate_references" name="inappropriate_references" class="form-control" rows="1" readonly>{{ $review->inappropriate_references }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->inappropriate_references === null && $review->project_id === $records->id)
                    <textarea id="inappropriate_references" name="inappropriate_references" class="form-control" rows="1"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="comprehensive_application">6.	Is the application comprehensive?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->comprehensive_application !== null && $review->project_id === $records->id)
                    <textarea id="comprehensive_application" name="comprehensive_application" class="form-control" rows="1" readonly>{{ $review->comprehensive_application }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->comprehensive_application === null && $review->project_id === $records->id)
                    <textarea id="comprehensive_application" name="comprehensive_application" class="form-control" rows="1"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="grammar_and_presentation">7.	Is the grammar and presentation poor? Although this should not be heavily waited.</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->grammar_and_presentation !== null && $review->project_id === $records->id)
                    <textarea id="grammar_and_presentation" name="grammar_and_presentation" class="form-control" rows="1" readonly>{{ $review->grammar_and_presentation }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->grammar_and_presentation === null && $review->project_id === $records->id)
                    <textarea id="grammar_and_presentation" name="grammar_and_presentation" class="form-control" rows="1"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="assumption_of_reader_knowledge">8.	If the submission is very technical, is it because the author has assumed too much of the reader’s knowledge?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->assumption_of_reader_knowledge !== null && $review->project_id === $records->id)
                    <textarea id="assumption_of_reader_knowledge" name="assumption_of_reader_knowledge" class="form-control" rows="1" readonly>{{ $review->assumption_of_reader_knowledge }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->assumption_of_reader_knowledge === null && $review->project_id === $records->id)
                    <textarea id="assumption_of_reader_knowledge" name="assumption_of_reader_knowledge" class="form-control" rows="1"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="clear_figures_and_tables">9.	Are figures and tables clear and easy to interpret?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->clear_figures_and_tables !== null && $review->project_id === $records->id)
                    <textarea id="clear_figures_and_tables" name="clear_figures_and_tables" class="form-control" rows="1" readonly>{{ $review->clear_figures_and_tables }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->clear_figures_and_tables === null && $review->project_id === $records->id)
                    <textarea id="clear_figures_and_tables" name="clear_figures_and_tables" class="form-control" rows="1"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="adequate_explanations">10.	Are explanations adequate?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->adequate_explanations !== null && $review->project_id === $records->id)
                    <textarea id="adequate_explanations" name="adequate_explanations" class="form-control" rows="1" readonly>{{ $review->adequate_explanations }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->adequate_explanations === null && $review->project_id === $records->id)
                    <textarea id="adequate_explanations" name="adequate_explanations" class="form-control" rows="1"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="technical_or_methodological_errors">11.	Are there any technical or methodological errors?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->technical_or_methodological_errors !== null && $review->project_id === $records->id)
                    <textarea id="technical_or_methodological_errors" name="technical_or_methodological_errors" class="form-control" rows="1" readonly>{{ $review->technical_or_methodological_errors }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->technical_or_methodological_errors === null && $review->project_id === $records->id)
                    <textarea id="technical_or_methodological_errors" name="technical_or_methodological_errors" class="form-control" rows="1"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

            <div class="form-group">
              <label for="other_rsc">Other Comments</label>
              @if($reviewerCommented > 0)
                @foreach ($revs as $review) 
                    @if ($review->user->id === Auth::user()->id && $review->other_comments !== null && $review->project_id === $records->id)
                      <textarea id="other_comments" name="other_comments" class="form-control" rows="1" readonly>{{ $review->other_comments }}</textarea>
                    @endif
                    @if ($review->user->id === Auth::user()->id && $review->other_comments === null && $review->project_id === $records->id)
                      <textarea id="other_comments" name="other_comments" class="form-control" rows="1"></textarea>
                    @endif
                @endforeach
              @endif 
            </div>

            <div class="form-group">
                <label for="review_decision">Review Decision</label>
              @if($reviewerCommented > 0)
                @foreach ($revs as $review) 
                    @if ($review->user->id === Auth::user()->id && $review->review_decision !== null && $review->project_id === $records->id)
                      <select class="form-control" id="review_decision" name="review_decision" required @if ($reviewerCommented) disabled @endif>
                          <option value="">Select</option>
                          <option value="Accepted" @if ($review->review_decision === 'Accepted') selected @endif>Accepted</option>
                          <option value="Accepted with Revision" @if ($review->review_decision === 'Accepted with Revision') selected @endif>Accepted with Revision</option>
                          <option value="Rejected" @if ($review->review_decision === 'Rejected') selected @endif>Rejected</option>
                      </select>
                    @endif
                    @if ($review->user->id === Auth::user()->id && $review->review_decision === null && $review->project_id === $records->id)
                      <select class="form-control" id="review_decision" name="review_decision" required>
                          <option value="">Select</option>
                          <option value="Accepted">Accepted</option>
                          <option value="Accepted with Revision">Accepted with Revision</option>
                          <option value="Rejected">Rejected</option>
                      </select>
                    @endif
                @endforeach
              @endif 
            </div>
            <br>
            <a href="#" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Submit Review" class="btn btn-info float-right">
          </form>
        </div>
    </div>
</div>
</div>
</div>
<a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
    <i class="fas fa-chevron-up"></i>
</a>

<script>
  
  // Function to automatically resize the textarea based on its content
  function autoResizeTextarea(event) {
    var textarea = event.target;
    textarea.style.height = 'auto'; // Reset the height
    textarea.style.height = (textarea.scrollHeight) + 'px'; // Set the height to the scrollHeight
  }

  // Run the autoResizeTextarea function when the page loads and whenever the textarea content changes
  window.addEventListener('load', function () {
    var textareas = document.querySelectorAll('textarea'); // Select all textareas on the page

    textareas.forEach(function (textarea) {
      textarea.addEventListener('input', autoResizeTextarea);
      autoResizeTextarea({ target: textarea });
    });
  });
</script>
@endsection
