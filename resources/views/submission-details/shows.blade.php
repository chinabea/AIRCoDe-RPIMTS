@extends('layouts.template')
@section('content')

<div class="content-wrapper">
  <section class="content-header">
  </section>

  {{-- @include('messages.chat-widget') --}}
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

  <!-- Tabs -->
  <!-- <style>
      /* Custom tab colors */
      .nav-tabs .nav-item.show .nav-link,
      .nav-tabs .nav-link.active {
          background-color: #022A44;
          color: #ffffff; /* Text color for active tab */
      }

      .nav-tabs .nav-link {
          background-color: #ffffff; /* Inactive tab color */
          color: #333; /* Text color for inactive tab */
      }
  </style> -->
  <div class="col-md-12">
  <div class="callout callout-info">
    <h5><i class="fas fa-info"></i> Note:</h5>
    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
    <!-- <div class="breaking-news">
        <marquee behavior="scroll" direction="left" class="text-warning weight-text-bold">
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
            <span>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
            <span>Breaking news item 3.</span>
            <span>Breaking news item 4.</span>
        </marquee>
    </div> -->
  </div>
  </div>

@if(Auth::check())
@if(Auth::user()->role == 1 || Auth::user()->role == 3)


  @elseif(Auth::user()->role == 2 || Auth::user()->role == 4)
  <div class="col-md-12">

  @foreach ($revs as $review)
    @if ($review->user->id === Auth::user()->id &&  $review->contribution_to_knowledge !== null && $review->project_id === $records->id)
    <div class="alert alert-danger">
        You have reviewed this project.
    </div>
    @endif
  @endforeach

<!-- <div class="row">
<div class="col-lg-6"> -->
          @if(auth()->user()->role == 2)
          <div class="row">

<div class="col-xl-8 col-lg-7">

    <!-- Area Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Research Reviews</h6>
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
          @elseif(auth()->user()->role == 4)
            <!-- <i class="fas fa-file-signature fa-2x text-gray-300"></i>
            <h5 class="m-0 ml-3 font-weight-bold">REVIEW</h5> -->
            <h6 class="m-0 font-weight-bold text-primary text-center">Review</h6>
          @endif
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <form method="POST"
            @if(auth()->user()->role == 2)
            action="{{ route('store.summary.reviews', $records->id) }}">
            @csrf
            <input type="hidden" name="project_id" value="{{ $records->id }}">
            @elseif(auth()->user()->role == 4)
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
                @endforeach
              @else
                  <textarea id="contribution_to_knowledge" name="contribution_to_knowledge" class="form-control" rows="1"></textarea>
              @endif
            </div>

            <div class="form-group">
              <label for="technical_soundness">2.	Is this paper technically sound?</label>
              @if($reviewerCommented > 0)
                @foreach ($revs as $review)
                    @if ($review->user->id === Auth::user()->id && $review->technical_soundness !== null && $review->project_id === $records->id)
                      <textarea id="technical_soundness" name="technical_soundness" class="form-control" rows="1" readonly>{{ $review->technical_soundness }}</textarea>
                    @endif
                @endforeach
              @else
                <textarea id="technical_soundness" name="technical_soundness" class="form-control" rows="1"></textarea>
              @endif
            </div>

            <div class="form-group">
              <label for="comprehensive_subject_matter">3.	Is the subject matter presented in a comprehensive manner?</label>
              @if($reviewerCommented > 0)
                @foreach ($revs as $review)
                    @if ($review->user->id === Auth::user()->id && $review->comprehensive_subject_matter !== null && $review->project_id === $records->id)
                      <textarea id="comprehensive_subject_matter" name="comprehensive_subject_matter" class="form-control" readonly>{{ $review->comprehensive_subject_matter }}</textarea>
                    @endif
                @endforeach
                @else
                  <textarea id="comprehensive_subject_matter" name="comprehensive_subject_matter" class="form-control" rows="1"></textarea>
                @endif
            </div>

            <div class="form-group">
              <label for="applicable_and_sufficient_references">4. Are the references provided applicable and sufficient?</label>
              @if($reviewerCommented > 0)
                @foreach ($revs as $review)
                    @if ($review->user->id === Auth::user()->id && $review->applicable_and_sufficient_references !== null && $review->project_id === $records->id)
                      <textarea id="applicable_and_sufficient_references" name="applicable_and_sufficient_references" class="form-control" rows="1" readonly>{{ $review->applicable_and_sufficient_references }}</textarea>
                    @endif
                @endforeach
                @else
                  <textarea id="applicable_and_sufficient_references" name="applicable_and_sufficient_references" class="form-control" rows="1"></textarea>
                @endif
            </div>

            <div class="form-group">
              <label for="inappropriate_references">5.	Are there references that are not appropriate for the topic being discussed?</label>
              @if($reviewerCommented > 0)
                @foreach ($revs as $review)
                    @if ($review->user->id === Auth::user()->id && $review->inappropriate_references !== null && $review->project_id === $records->id)
                      <textarea id="inappropriate_references" name="inappropriate_references" class="form-control" rows="1" readonly>{{ $review->inappropriate_references }}</textarea>
                    @endif
                @endforeach
                @else
                  <textarea id="inappropriate_references" name="inappropriate_references" class="form-control" rows="1"></textarea>
                @endif
            </div>

            <div class="form-group">
              <label for="comprehensive_application">6.	Is the application comprehensive?</label>
              @if($reviewerCommented > 0)
                @foreach ($revs as $review)
                    @if ($review->user->id === Auth::user()->id && $review->comprehensive_application !== null && $review->project_id === $records->id)
                      <textarea id="comprehensive_application" name="comprehensive_application" class="form-control" rows="1" readonly>{{ $review->comprehensive_application }}</textarea>
                    @endif
                @endforeach
                @else
                  <textarea id="comprehensive_application" name="comprehensive_application" class="form-control" rows="1"></textarea>
                @endif
            </div>

            <div class="form-group">
              <label for="grammar_and_presentation">7.	Is the grammar and presentation poor? Although this should not be heavily waited.</label>
              @if($reviewerCommented > 0)
                @foreach ($revs as $review)
                    @if ($review->user->id === Auth::user()->id && $review->grammar_and_presentation !== null && $review->project_id === $records->id)
                      <textarea id="grammar_and_presentation" name="grammar_and_presentation" class="form-control" rows="1" readonly>{{ $review->grammar_and_presentation }}</textarea>
                    @endif
                @endforeach
                @else
                  <textarea id="grammar_and_presentation" name="grammar_and_presentation" class="form-control" rows="1"></textarea>
                @endif
            </div>

            <div class="form-group">
              <label for="assumption_of_reader_knowledge">8.	If the submission is very technical, is it because the author has assumed too much of the reader’s knowledge?</label>
              @if($reviewerCommented > 0)
                @foreach ($revs as $review)
                    @if ($review->user->id === Auth::user()->id && $review->assumption_of_reader_knowledge !== null && $review->project_id === $records->id)
                      <textarea id="assumption_of_reader_knowledge" name="assumption_of_reader_knowledge" class="form-control" rows="1" readonly>{{ $review->assumption_of_reader_knowledge }}</textarea>
                    @endif
                @endforeach
                @else
                  <textarea id="assumption_of_reader_knowledge" name="assumption_of_reader_knowledge" class="form-control" rows="1"></textarea>
                @endif
            </div>

            <div class="form-group">
              <label for="clear_figures_and_tables">9.	Are figures and tables clear and easy to interpret?</label>
              @if($reviewerCommented > 0)
                @foreach ($revs as $review)
                    @if ($review->user->id === Auth::user()->id && $review->clear_figures_and_tables !== null && $review->project_id === $records->id)
                      <textarea id="clear_figures_and_tables" name="clear_figures_and_tables" class="form-control" rows="1" readonly>{{ $review->clear_figures_and_tables }}</textarea>
                    @endif
                @endforeach
                @else
                  <textarea id="clear_figures_and_tables" name="clear_figures_and_tables" class="form-control" rows="1"></textarea>
                @endif
            </div>

            <div class="form-group">
              <label for="adequate_explanations">10.	Are explanations adequate?</label>
              @if($reviewerCommented > 0)
                @foreach ($revs as $review)
                    @if ($review->user->id === Auth::user()->id && $review->adequate_explanations !== null && $review->project_id === $records->id)
                      <textarea id="adequate_explanations" name="adequate_explanations" class="form-control" rows="1" readonly>{{ $review->adequate_explanations }}</textarea>
                    @endif
                @endforeach
                @else
                  <textarea id="adequate_explanations" name="adequate_explanations" class="form-control" rows="1"></textarea>
                @endif
            </div>

            <div class="form-group">
              <label for="technical_or_methodological_errors">11.	Are there any technical or methodological errors?</label>
              @if($reviewerCommented > 0)
                @foreach ($revs as $review)
                    @if ($review->user->id === Auth::user()->id && $review->technical_or_methodological_errors !== null && $review->project_id === $records->id)
                      <textarea id="technical_or_methodological_errors" name="technical_or_methodological_errors" class="form-control" rows="1" readonly>{{ $review->technical_or_methodological_errors }}</textarea>
                    @endif
                @endforeach
                @else
                  <textarea id="technical_or_methodological_errors" name="technical_or_methodological_errors" class="form-control" rows="1"></textarea>
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
      <!-- <div class="card shadow mb-4"> -->
          <!-- <div href="#collapseCardExample1" class="card-header py-3 d-flex justify-content-center align-items-center" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
              <i class="fas fa-file-signature fa-2x text-gray-300"></i>
              <h6 class="m-0 ml-3 font-weight-bold">{{ $records->project_name }}</h6>
          </div>
          <div class="collapse show" id="collapseCardExample1" style="">
              <div class="card-body">
                <label>1. Does the paper contribute to the body of knowledge?</label><br>
                @foreach ($revs as $review)
                @if ($review->user->role === 4 && $review->project_id === $records->id)
                <p><b>{{ $review->user->name }}:</b> {{ $review->contribution_to_knowledge }}</p>
                @endif
                @endforeach

                <br>

                <label>2.	Is this paper technically sound?</label><br>
                @foreach ($revs as $review)
                @if ($review->user->role === 4 && $review->project_id === $records->id)
                <p><b>{{ $review->user->name }}:</b> {{ $review->technical_soundness }}</p>
                @endif
                @endforeach

                <br>

                <label>3.	Is the subject matter presented in a comprehensive manner?</label><br>
                @foreach ($revs as $review)
                @if ($review->user->role === 4 && $review->project_id === $records->id)
                <p><b>{{ $review->user->name }}:</b> {{ $review->comprehensive_subject_matter }}</p>
                @endif
                @endforeach

                <br>

                <label>4.	Are the references provided applicable and sufficient?</label><br>
                @foreach ($revs as $review)
                @if ($review->user->role === 4 && $review->project_id === $records->id)
                <p><b>{{ $review->user->name }}:</b> {{ $review->applicable_and_sufficient_references }}</p>
                @endif
                @endforeach

                <br>

                <label>5. Are there references that are not appropriate for the topic being discussed?</label><br>
                @foreach ($revs as $review)
                @if ($review->user->role === 4 && $review->project_id === $records->id)
                <p><b>{{ $review->user->name }}:</b> {{ $review->inappropriate_references }}</p>
                @endif
                @endforeach

                <br>

                <label>6. Is the application comprehensive?</label><br>
                @foreach ($revs as $review)
                @if ($review->user->role === 4 && $review->project_id === $records->id)
                <p><b>{{ $review->user->name }}:</b> {{ $review->comprehensive_application }}</p>
                @endif
                @endforeach

                <br>

                <label>7. Is the grammar and presentation poor? Although this should not be heavily waited.</label><br>
                @foreach ($revs as $review)
                @if ($review->user->role === 4 && $review->project_id === $records->id)
                <p><b>{{ $review->user->name }}:</b> {{ $review->grammar_and_presentation }}</p>
                @endif
                @endforeach

                <br>

                <label>8. If the submission is very technical, is it because the author has assumed too much of the reader’s knowledge?</label><br>
                @foreach ($revs as $review)
                @if ($review->user->role === 4 && $review->project_id === $records->id)
                <p><b>{{ $review->user->name }}:</b> {{ $review->assumption_of_reader_knowledge }}</p>
                @endif
                @endforeach

                <br>

                <label>9. Are figures and tables clear and easy to interpret?</label><br>
                @foreach ($revs as $review)
                @if ($review->user->role === 4 && $review->project_id === $records->id)
                <p><b>{{ $review->user->name }}:</b> {{ $review->clear_figures_and_tables }}</p>
                @endif
                @endforeach

                <br>

                <label>10.	Are explanations adequate?</label><br>
                @foreach ($revs as $review)
                @if ($review->user->role === 4 && $review->project_id === $records->id)
                <p><b>{{ $review->user->name }}:</b> {{ $review->adequate_explanations }}</p>
                @endif
                @endforeach

                <br>

                <label>11.	Are there any technical or methodological errors?</label><br>
                @foreach ($revs as $review)
                @if ($review->user->role === 4 && $review->project_id === $records->id)
                <p><b>{{ $review->user->name }}:</b> {{ $review->technical_or_methodological_errors }}</p>
                @endif
                @endforeach

                <br>

                <label>12. Other Comments</label><br>
                @foreach ($revs as $review)
                @if ($review->user->role === 4 && $review->project_id === $records->id)
                <p><b>{{ $review->user->name }}:</b> {{ $review->other_comments }}</p>
                @endif
                @endforeach

                <br>

                <label>13. Review Decision</label><br>
                @foreach ($revs as $review)
                @if ($review->user->role === 4 && $review->project_id === $records->id)
                <p><b>{{ $review->user->name }}:</b> {{ $review->review_decision }}</p>
                @endif
                @endforeach -->


              <!-- </div>
          </div>
      </div> -->
          @else
      <div class="card shadow mb-4">
          <div href="#collapseCardExample" class="card-header py-3 d-flex justify-content-center align-items-center" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <i class="fas fa-info-circle fa-2x text-gray-300"></i>
              <h6 class="m-0 ml-3 font-weight-bold">{{ $records->project_name }}</h6>
          </div>
          <div class="collapse show" id="collapseCardExample" style="">
              <div class="card-body">
                <label>Research Group</label><br>
                {{ $records->research_group }}

                <br><br>

                <label>Author(s)</label><br>
                {{ $records->authors }}
                <p>{{ $data->user->name }}</p>
                @foreach ($teamMembers as $member)
                    <p>{{ $member->member_name }}</p>
                @endforeach

                <br>

                <label>Introduction</label><br>
                {!! $records->introduction !!}

                <br>

                <label>Aims and Objectives</label><br>
                {!! $records->aims_and_objectives !!}

                <br>

                <label>Background</label><br>
                {!! $records->background !!}

                <br>

                <label>Expected Research Contribution</label><br>
                {!! $records->expected_research_contribution !!}

                <br>

                <label>The Proposed Methodology</label><br>
                {!! $records->proposed_methodology !!}

                <br>

                <label>Work Plan</label><br>
                {!! $records->workplan !!}

                <br>

                <label>Resources</label><br>
                {!! $records->resources !!}

                <br>

                <label>References</label><br>
                {!! $records->references !!}

                <br>

                <label>Total Budget</label><br>
                {!! $records->references !!}
              </div>
          </div>
      </div>
    </div>
      @endif

<!-- <div class="col-lg-6">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-center align-items-center"> -->
          <!-- @if(auth()->user()->role == 2)
            <i class="fas fa-file-signature fa-2x text-gray-300"></i>
            <h5 class="m-0 ml-3 font-weight-bold">SUMMARIZE REVIEWS</h5>
          <input type="hidden" name="project_id" value="{{ $records->id }}">
          @else
            <i class="fas fa-file-signature fa-2x text-gray-300"></i>
            <h5 class="m-0 ml-3 font-weight-bold">REVIEW</h5>
          @endif -->
      <!-- </div>
        <div class="card-body"> -->
          <!-- <form method="POST"
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
                    <textarea id="comprehensive_subject_matter" name="comprehensive_subject_matter" class="form-control" readonly>{{ $review->comprehensive_subject_matter }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->comprehensive_subject_matter === null && $review->project_id === $records->id)
                    <textarea id="comprehensive_subject_matter" name="comprehensive_subject_matter" class="form-control" rows="1"></textarea>
                  @endif
              @endforeach
            @endif
          </div>

          <div class="form-group">
            <label for="applicable_and_sufficient_references">4. Are the references provided applicable and sufficient?</label>
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
        </form> -->
      </div>
    </div>
  </div>
</div>

<!-- <div class="container mt-3">
        <h2 class="m-0 font-weight-bold">Call for Proposals</h2>
        <br>
    <div class="card shadow mb-4">
        <div class="card-body">
        <div class="table-responsive">
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
    </div>
</div>   -->

@endif

    @if(Auth::user()->role == 1)


    <ul class="nav nav-tabs justify-content-center" id="myTabs" role="tablist">
          <li class="nav-item">
              <a class="nav-link" id="details-btn" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="false">
                  <i class="fas fa-info-circle mr-2"></i>Details
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="project-team-btn" data-toggle="tab" href="#project-team" role="tab" aria-controls="project-team" aria-selected="false">
                  <i class="fas fa-users mr-2"></i>Members
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="tasks-btn" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-selected="false">
                  <i class="fas fa-tasks mr-2"></i>Tasks
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="lib-btn" data-toggle="tab" href="#lib" role="tab" aria-controls="lib" aria-selected="false">
                  <i class="fas fa-list-alt mr-2"></i>Line-Item Budget
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="files-btn" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false">
                  <i class="fas fa-file-alt mr-2"></i>Files
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="messages-btn" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">
                  <i class="fas fa-comments mr-2"></i>Reviews
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="reviewer-btn" data-toggle="tab" href="#reviewer" role="tab" aria-controls="reviewer" aria-selected="false">
            <i class="fas fa-user-check mr-2"></i>Reviewer
              </a>
          </li>
      </ul>
    @elseif(Auth::user()->role == 2)


    @elseif(Auth::user()->role == 3)
    <div class="col-md-12">
      <div class="card card-navy color-palette card-tabs">
        <div class="card-header p-0">
          <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
            <li class="pt-2 px-3"><h3 class="card-title">Submission Details</h3></li>
            <li class="nav-item text-center">
              <a class="nav-link" id="actions-btn" data-toggle="tab" href="#actions" role="tab" aria-controls="actions" aria-selected="true">
                  <i class="fas fa-cogs mr-2"></i>Actions
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="details-btn" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="false">
                  <i class="fas fa-info-circle mr-2"></i>Details
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="project-team-btn" data-toggle="tab" href="#project-team" role="tab" aria-controls="project-team" aria-selected="false">
                  <i class="fas fa-users mr-2"></i>Members
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tasks-btn" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-selected="false">
                  <i class="fas fa-tasks mr-2"></i>Tasks
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="lib-btn" data-toggle="tab" href="#lib" role="tab" aria-controls="lib" aria-selected="false">
                  <i class="fas fa-list-alt mr-2"></i>Line-Item Budget
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="files-btn" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false">
                  <i class="fas fa-file-alt mr-2"></i>Files
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="messages-btn" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">
                  <i class="fas fa-comments mr-2"></i>Reviews
              </a>
            </li>
          </ul>
        </div>
      @endif
      @endif

<div class="card-body">

<div id="actions-form" class="mt-4" style="display: none;">
        @if (Auth::user()->role == 3 && $records->status === "For Revision")
        <form action="{{ route('projects.edit', $records->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="tracking_code" class="form-label">Tracking Code</label>
              <input type="text" value="{{ $records->tracking_code }}" class="form-control" id="tracking_code" name="tracking_code" readonly>
            </div>

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
            <button type="submit" class="btn btn-warning float-right">Update Proposal</button>
          </form>
        @else
            <p>You do not have access to edit this project not until the project status is "For Revision."</p>
        @endif
        </div>

<div id="details-form" class="mt-4" style="display: none;">
            <a href="{{ route('generate.pdf', ['data_id' => $records->id]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>

            <div style="text-align: justify;">
                <label>Project Name:</label><br>
                {{ $records->project_name }}
                <br>
                <br>

                <label>Status:</label><br>
                {{ $records->status }}
                <br>
                <br>

                <label>Research Group:</label><br>
                {{ $records->research_group }}
                <br>
                <br>

                <label>Author(s):</label><br>
                {{ $records->authors }}
                <p>{{ $data->user->name }}</p>
                @foreach ($teamMembers as $member)
                    <p>{{ $member->member_name }}</p>
                @endforeach
                <br>

                <label>Introduction:</label><br>
                {!! $records->introduction !!}
                <br>

                <label>Aims and Objectives:</label><br>
                {!! $records->aims_and_objectives !!}
                <br>

                <label>Background:</label><br>
                {!! $records->background !!}
                <br>

                <label>Expected Research Contribution:</label><br>
                {!! $records->expected_research_contribution !!}
                <br>

                <label>The Proposed Methodology:</label><br>
                {!! $records->proposed_methodology !!}
                <br><br>

                <label>Work Plan:</label><br>
                {!! $records->workplan !!}
                <br>

                <label>Resources:</label><br>
                {!! $records->resources !!}
                <br>

                <label>References:</label><br>
                {!! $records->references !!}
                <br>
            </div>
          </div>

<div id="tasks-form" class="mt-4" style="display: none;">
            @if (auth()->check() && auth()->user()->role == 3)
            <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#Tasks" data-backdrop="static" data-keyboard="false">Add Task</button>
            @include('submission-details.tasks.create')
            @endif
        <table id="example1" class="table table-hover table-bordered text-center table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Description</th>
              <th>Added at</th>
              <th>Due Date</th>
              <th>Assigned To</th>
              <th>Updated At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tasks as $task)
            <tr>
              <td class="align-middle">{{ $loop->iteration }}.</td>
              <td>{{ $task->title }}</td>
              <td>{{ $task->description }}</td>
              <td>{{ $task->created_at }}</td>
              <td>{{ $task->end_date }}</td>
              <td>{{ $task->assignedTo->name }}</td>
              <td>{{ $task->updated_at }}</td>
              <td>
                <a href="{{ route('submission-details.tasks.edit', $task->id) }}" type="button" class="btn btn-warning" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#editModal{{ $task->id }}">
                    <i class="fas fa-edit"></i>
                </a>
                <div class="modal fade" id="editModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $task->id }}Label" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="editModal{{ $task->id }}Label">Edit Task</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form method="post" action="{{ route('submission-details.tasks.update', $task->id) }}" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="modal-body text-left">
                                  <div class="form-group">
                                      <label for="title">Title</label>
                                      <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}">
                                  </div>
                                  <div class="form-group">
                                      <label for="description">Description</label>
                                      <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="assigned_to">Assigned To</label>
                                      <select name="assigned_to" id="assigned_to" class="form-control">
                                          @foreach ($members as $member)
                                              <option value="{{ $member->id }}" {{ $member->id == $task->assigned_to ? 'selected' : '' }}>
                                                  {{ $member->name }}
                                              </option>
                                          @endforeach
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="start_date">Start Date</label>
                                      <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $task->start_date ? $task->start_date->format('Y-m-d') : '' }}" >
                                  </div>
                                  <div class="form-group">
                                      <label for="end_date">End Date</label>
                                      <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $task->end_date ? $task->end_date->format('Y-m-d') : '' }}" >
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-primary">Save Changes</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
              <button class="btn btn-danger" onclick="confirmDelete('{{ route('submission-details.tasks.delete', $task->id) }}')">
                <i class="fas fa-trash"></i>
              </button>
              </td>
            </tr>
        @endforeach
          </tbody>
        </table>
          </div>


<div id="lib-form" class="mt-4" style="display: none;">
          @if (auth()->check() && auth()->user()->role == 3)
          <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#lib">Add Line-Item</button>
          @include('submission-details.line-items-budget.create')
            @endif
          <table id="example1" class="table table-hover table-bordered text-center table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lineItems as $lineItem)
              <tr>
                <td class="align-middle">{{ $loop->iteration }}.</td>
                <td>{{ $lineItem->name }}</td>
                <td>{{ $lineItem->quantity }}</td>
                <td>{{ $lineItem->unit_price }}</td>
                <td>
                  <a href="{{ route('submission-details.line-items-budget.edit', $lineItem->id) }}" type="button" class="btn btn-warning" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#editModal{{ $lineItem->id }}">
                      <i class="fas fa-edit"></i>
                  </a>
                  <div class="modal fade" id="editModal{{ $lineItem->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $lineItem->id }}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModal{{ $lineItem->id }}Label">Edit Line-Item Budget</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{ route('submission-details.line-items-budget.update', $lineItem->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    @php
                                        $totalAllLineItems = 0;
                                        foreach ($allLineItems as $item) {
                                            $totalAllLineItems += $item->quantity * $item->unit_price;
                                        }
                                    @endphp
                                    <div class="form-group">
                                        <label for="edit_name">Name:</label>
                                        <input type="text" class="form-control" id="edit_name{{ $lineItem->id }}" name="name" value="{{ $lineItem->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_quantity">Quantity:</label>
                                        <input type="number" class="form-control" id="edit_quantity{{ $lineItem->id }}" name="quantity" value="{{ $lineItem->quantity }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_unit_price">Unit Price:</label>
                                        <input type="number" class="form-control" id="edit_unit_price{{ $lineItem->id }}" name="unit_price" value="{{ $lineItem->unit_price }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger" onclick="confirmDelete('{{ route('submission-details.line-items-budget.destroy', $lineItem->id) }}')">
                  <i class="fas fa-trash"></i>
                </button>
                </td>
              </tr>
          @endforeach
            </tbody>
          </table>
          <div class="form-group float-right">
              <label for="edit_total">Total:</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text">₱</span>
                  </div>
                  <input type="text" class="form-control bg-light text-large" id="total_all_line_items" value="{{ number_format($totalAllLineItems, 2, '.', ',') }}" readonly>
              </div>
          </div>
          </div>


<div id="files-form" class="mt-4" style="display: none;">
          @if (auth()->check() && auth()->user()->role == 3)
        <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#filesModal">Add File</button>
            @include('submission-details.files.create')
          @endif
          <table id="example1" class="table table-hover table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>#</th>
                <th>Filename</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
              </tr>
            </thead>
            @foreach($files as $file)
            <tbody>
              <tr>
                <td class="align-middle">{{ $loop->iteration }}.</td>
                <td>{{ $file->file_name }}</td>
                <td>{{ $file->created_at }}</td>
                <td>{{ $file->updated_at }}</td>
                <td>
                <a href="{{ route('submission-details.files.preview', ['filename' => $file->file_path]) }}" class="btn btn-secondary">
                    <i class="fas fa-eye"></i>
                </a>

                <a href="{{ route('file.download', ['id' => $file->id]) }}" class="btn btn-primary">
                    <i class="fas fa-download"></i>
                </a>
                <a href="{{ route('submission-details.files.edit', $file->id) }}" type="button" class="btn btn-warning" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#editFileModal{{ $file->id }}">
                    <i class="fas fa-edit"></i>
                </a>
                <div class="modal fade" id="editFileModal{{ $file->id }}" tabindex="-1" role="dialog" aria-labelledby="editFileModal{{ $file->id }}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editFileModal{{ $file->id }}Label">Edit File</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{ route('submission-details.files.reupload', $file->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="edit_file_name">File Name:</label>
                                        <input type="text" class="form-control" id="edit_file_name{{ $file->id }}" name="file_name" value="{{ $file->file_name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="file">Choose File:</label>
                                        <input type="file" class="form-control-file" id="file" name="file" accept=".pdf, .doc, .docx" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger" onclick="confirmDelete('{{ route('submission-details.files.delete', $file->id) }}')">
                  <i class="fas fa-trash"></i>
                </button>
                </td>
              </tr>
            </tbody>
          @endforeach
          </table>
          </div>

<div id="messages-form" class="mt-4" style="display: none;">
                @php
                    $reviewAvailable = false; // Initialize a flag
                @endphp

                @foreach ($revs as $review)
                    @if ($review->user->role === 2 && $review->project_id === $records->id)
                        <div class="py-3 d-flex justify-content-center align-items-center" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                            <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                            <h3 class="m-0 ml-3 font-weight-bold">{{ $records->project_name }}</h3>

                        </div>
                        @if (auth()->user()->role == 1)
                                <h6 class="m-0 font-weight-bold text-primary text-center">Review Decision</h6>
                                <br>
                                <div class="text-center">
                                    <form action="{{ route('projects.updateStatus', ['id' => $records->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="project_id" value="{{ $records->id }}">
                                        <div class="form-group">
                                            <button value="Approved" type="submit" id="status" name="status" class="btn btn-info">
                                                <i class="fas fa-check-circle mr-2"></i>Accepted
                                            </button>
                                            <button value="For Revision" type="submit" id="status" name="status" class="btn btn-warning">
                                                <i class="fas fa-edit mr-2"></i>Accepted with Revision
                                            </button>
                                            <button value="Disapproved" type="submit" id="status" name="status" class="btn btn-danger">
                                                <i class="fas fa-times-circle mr-2"></i>Rejected
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        <div class="card-body">
                            <label>1. Does the paper contribute to the body of knowledge?</label><br>
                            <p><b>{{ $review->user->name }}:</b> {{ $review->contribution_to_knowledge }}</p>

                            <br>

                            <label>2.	Is this paper technically sound?</label><br>
                            <p><b>{{ $review->user->name }}:</b> {{ $review->technical_soundness }}</p>

                            <br>

                            <label>3.	Is the subject matter presented in a comprehensive manner?</label><br>
                            <p><b>{{ $review->user->name }}:</b> {{ $review->comprehensive_subject_matter }}</p>

                            <br>

                            <label>4.	Are the references provided applicable and sufficient?</label><br>
                            <p><b>{{ $review->user->name }}:</b> {{ $review->applicable_and_sufficient_references }}</p>

                            <br>

                            <label>5. Are there references that are not appropriate for the topic being discussed?</label><br>
                            <p><b>{{ $review->user->name }}:</b> {{ $review->inappropriate_references }}</p>

                            <br>

                            <label>6. Is the application comprehensive?</label><br>
                            <p><b>{{ $review->user->name }}:</b> {{ $review->comprehensive_application }}</p>

                            <br>

                            <label>7. Is the grammar and presentation poor? Although this should not be heavily waited.</label><br>
                            <p><b>{{ $review->user->name }}:</b> {{ $review->grammar_and_presentation }}</p>

                            <br>

                            <label>8. If the submission is very technical, is it because the author has assumed too much of the reader’s knowledge?</label><br>
                            <p><b>{{ $review->user->name }}:</b> {{ $review->assumption_of_reader_knowledge }}</p>

                            <br>

                            <label>9. Are figures and tables clear and easy to interpret?</label><br>
                            <p><b>{{ $review->user->name }}:</b> {{ $review->clear_figures_and_tables }}</p>

                            <br>

                            <label>10.	Are explanations adequate?</label><br>
                            <p><b>{{ $review->user->name }}:</b> {{ $review->adequate_explanations }}</p>

                            <br>

                            <label>11.	Are there any technical or methodological errors?</label><br>
                            <p><b>{{ $review->user->name }}:</b> {{ $review->technical_or_methodological_errors }}</p>

                            <br>

                            <label>12. Other Comments</label><br>
                            <p><b>{{ $review->user->name }}:</b> {{ $review->other_comments }}</p>

                            <br>

                            <label>13. Review Decision</label><br>
                            <p><b>{{ $review->user->name }}:</b> {{ $review->review_decision }}</p>
                          </div>
                                @php
                                    $reviewAvailable = true; // Set the flag to true if a review matches the conditions
                                @endphp
                    @endif
                @endforeach

                @if (!$reviewAvailable)
                    <p>Review not available yet!</p>
                @endif
            </div>

<div id="project-team-form" class="mt-4" style="display: none;">
          @if (auth()->check() && auth()->user()->role == 3)
            <button type="button" class="btn btn-primary my-2" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#ProjectTeam">Add Member</button>
            @include('submission-details.project-teams.create')
          @endif
            <table id="example1" class="table table-hover table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            @foreach($teamMembers as $member)
            <tbody>
              <tr>
                <td class="align-middle">{{ $loop->iteration }}.</td>
                <td>{{ $member->member_name }}</td>
                <td>{{ $member->role }}</td>
                <td>
                  <a href="{{ route('submission-details.project-teams.edit', $member->id) }}" type="button" class="btn btn-warning" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#editModal{{ $member->id }}">
                      <i class="fas fa-edit"></i>
                  </a>
                  <div class="modal fade" id="editModal{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $member->id }}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModal{{ $member->id }}Label">Edit Project Team Member</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{ route('submission-details.project-teams.update', $member->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="edit_member_name">Name:</label>
                                        <input type="text" class="form-control" id="edit_member_name{{ $member->id }}" name="member_name" value="{{ $member->member_name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_role">Role:</label>
                                        <select class="form-control" id="edit_role{{ $member->id }}" name="role" required>
                                            <option disabled>Select Role</option>
                                            <option{{ $member->role === 'Project Leader' ? ' selected' : '' }}>Project Leader</option>
                                            <option{{ $member->role === 'Database Designer' ? ' selected' : '' }}>Database Designer</option>
                                            <option{{ $member->role === 'Network Designer' ? ' selected' : '' }}>Network Designer</option>
                                            <option{{ $member->role === 'UI Designer' ? ' selected' : '' }}>UI Designer</option>
                                            <option{{ $member->role === 'Quality Assurance' ? ' selected' : '' }}>Quality Assurance</option>
                                            <option{{ $member->role === 'Document Writer' ? ' selected' : '' }}>Document Writer</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger" onclick="confirmDelete('{{ route('submission-details.project-teams.destroy', $member->id) }}')">
                  <i class="fas fa-trash"></i>
                </button>

                </td>
              </tr>
            </tbody>
          @endforeach
          </table>
          </div>

<div id="reviewer-form" class="mt-4" style="display: none;">
          <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#ReviewerModal" data-backdrop="static" data-keyboard="false">Select Reviewer</button>
              @include('submission-details.reviews.select-reviewer')

          </div>



</div>
</div>


</div>
</div>
</div>

<script>

  function confirmDelete(url) {
      if (confirm('Are you sure you want to delete this record?')) {
      // Create a hidden form and submit it programmatically
      var form = document.createElement('form');
      form.action = url;
      form.method = 'POST';
      form.innerHTML = '@csrf @method("delete")';
      document.body.appendChild(form);
      form.submit();
      }
  }

</script>
@endsection
