@extends('layouts.template')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
                            
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->technical_soundness_decision !== null && $review->project_id === $records->id)
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fas fa-exclamation-triangle"></i> Alert! You have commented on this project!</h6>
                  </div>
                  @endif
                  @endforeach
                </section>
  

<div class="row">
  

<div class="col-xl-8 col-lg-7">

    <!-- Area Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-center">{{ $records->project_name }}</h6>
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
                            <p><b>{{ $review->user->name }}:</b> {{ $review->contribution_to_knowledge_decision }} </p>
                            <p>{{ $review->contribution_to_knowledge_comments }}</p> 
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">2</td>
                        <th class="align-middle">Is this paper technically sound?</th>
                        <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->technical_soundness_decision }}</p> 
                          <p>{{ $review->technical_soundness_comments }}</p> 
                          @endif
                          @endforeach
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">3</td>
                        <th class="align-middle">Is the subject matter presented in a comprehensive manner?</th>
                        <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->comprehensive_subject_matter_decision }}</p> 
                          <p>{{ $review->comprehensive_subject_matter_comments }}</p> 
                          @endif
                          @endforeach
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">4</td>
                          <th class="align-middle">Are the references provided applicable and sufficient?</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->applicable_and_sufficient_references_decision }}</p> 
                          <p>{{ $review->applicable_and_sufficient_references_comments }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">5</td>
                          <th class="align-middle">Are there references that are not appropriate for the topic being discussed?</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->inappropriate_references_decision }}</p> 
                          <p> {{ $review->inappropriate_references_comments }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">6</td>
                          <th class="align-middle">Is the application comprehensive?</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->comprehensive_application_decision }}</p> 
                          <p> {{ $review->comprehensive_application_comments }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">7</td>
                          <th class="align-middle">Is the grammar and presentation poor? Although this should not be heavily waited.</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->grammar_and_presentation_decision }}</p> 
                          <p> {{ $review->grammar_and_presentation_comments }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">8</td>
                          <th class="align-middle">If the submission is very technical, is it because the author has assumed too much of the reader’s knowledge?</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->assumption_of_reader_knowledge_decision }}</p> 
                          <p> {{ $review->assumption_of_reader_knowledge_comments }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">9</td>
                          <th class="align-middle">Are figures and tables clear and easy to interpret?</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->clear_figures_and_tables_decision }}</p> 
                          <p> {{ $review->clear_figures_and_tables_comments }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">10</td>
                          <th class="align-middle">Are explanations adequate?</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->adequate_explanations_decision }}</p> 
                          <p> {{ $review->adequate_explanations_comments }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">11</td>
                          <th class="align-middle">Are there any technical or methodological errors?</th>
                          <td>@foreach ($revs as $review) 
                            @if ($review->user->role === 4 && $review->project_id === $records->id)
                            <p><b>{{ $review->user->name }}:</b> {{ $review->technical_or_methodological_errors_decision }}</p> 
                            <p> {{ $review->technical_or_methodological_errors_comments }}</p> 
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">12</td>
                          <th class="align-middle">Project Name</th>
                          <td>@foreach ($revs as $review) 
                            @if ($review->user->role === 4 && $review->project_id === $records->id)
                            <p><b>Review: </b> {{ $review->reseach_project_name }}</p>
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">13</td>
                          <th class="align-middle">Reseach Group</th>
                          <td>@foreach ($revs as $review) 
                            @if ($review->user->role === 4 && $review->project_id === $records->id)
                            <p><b>Review: </b> {{ $review->reseach_project_group }}</p>
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">14</td>
                          <th class="align-middle">Introduction</th>
                          <td>@foreach ($revs as $review) 
                            @if ($review->user->role === 4 && $review->project_id === $records->id)
                            <p><b>Review: </b> {{ $review->project_introduction }}</p>
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">15</td>
                          <th class="align-middle">Aims and Objectives</th>
                          <td>@foreach ($revs as $review) 
                            @if ($review->user->role === 4 && $review->project_id === $records->id)
                            <p><b>Review: </b> {{ $review->project_aims_and_objectives }}</p>
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">16</td>
                          <th class="align-middle">Background</th>
                          <td>@foreach ($revs as $review) 
                            @if ($review->user->role === 4 && $review->project_id === $records->id)
                            <p><b>Review: </b> {{ $review->project_background }}</p>
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">17</td>
                          <th class="align-middle">Expected Research Contribution</th>
                          <td>@foreach ($revs as $review) 
                            @if ($review->user->role === 4 && $review->project_id === $records->id)
                            <p><b>Review: </b> {{ $review->project_expected_research_contribution }}</p>
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">18</td>
                          <th class="align-middle">Proposed Methodology</th>
                          <td>@foreach ($revs as $review) 
                            @if ($review->user->role === 4 && $review->project_id === $records->id)
                            <p><b>Review: </b> {{ $review->project_proposed_methodology }}</p>
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">19</td>
                          <th class="align-middle">Workplan</th>
                          <td>@foreach ($revs as $review) 
                            @if ($review->user->role === 4 && $review->project_id === $records->id)
                            <p><b>Review: </b> {{ $review->project_workplan }}</p>
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">20</td>
                          <th class="align-middle">Resources</th>
                          <td>@foreach ($revs as $review) 
                            @if ($review->user->role === 4 && $review->project_id === $records->id)
                            <p><b>Review: </b> {{ $review->project_resources }}</p>
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">21</td>
                          <th class="align-middle">References</th>
                          <td>@foreach ($revs as $review) 
                            @if ($review->user->role === 4 && $review->project_id === $records->id)
                            <p><b>Review: </b> {{ $review->project_references }}</p>
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">22</td>
                          <th class="align-middle">Budget</th>
                          <td>@foreach ($revs as $review) 
                            @if ($review->user->role === 4 && $review->project_id === $records->id)
                            <p><b>Review: </b> {{ $review->project_total_budget }}</p>
                            @endif
                            @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">23</td>
                          <th class="align-middle">Other Comments</th>
                          <td>@foreach ($revs as $review) 
                          @if ($review->user->role === 4 && $review->project_id === $records->id)
                          <p><b>{{ $review->user->name }}:</b> {{ $review->other_comments }}</p> 
                          @endif
                          @endforeach
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">24</td>
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

<!-- Donut Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">
          @if(auth()->user()->role == 2)
            <h6 class="m-0 font-weight-bold text-center">Summarize Review</h6>
            <input type="hidden" name="project_id" value="{{ $records->id }}">
          @else
            <h6 class="m-0 font-weight-bold text-center">Review</h6>
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
            <label for="contribution_to_knowledge_decision">1. Does the paper contribute to the body of knowledge?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->contribution_to_knowledge_decision !== null && $review->project_id === $records->id)

                  <div class="form-group">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="contribution_to_knowledge_decision" id="contribution_to_knowledge_decision" value="Yes" disabled {{ $review->contribution_to_knowledge_decision == 'Yes' ? 'checked' : '' }}>
                      <label class="form-check-label" for="contribution_to_knowledge_decision">Yes</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="contribution_to_knowledge_decision" id="contribution_to_knowledge_decision" value="No" disabled {{ $review->contribution_to_knowledge_decision == 'No' ? 'checked' : '' }}>
                      <label class="form-check-label" for="contribution_to_knowledge_decision">No</label>
                    </div>
                    <div class="form-group">
                      <textarea id="contribution_to_knowledge_comments" name="contribution_to_knowledge_comments" class="form-control" placeholder="Other Comments" readonly>{{ $review->contribution_to_knowledge_comments }}</textarea>
                    </div>
                  </div> 

                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->contribution_to_knowledge_decision === null && $review->project_id === $records->id)
                  
                  <div class="form-group">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="contribution_to_knowledge_decision" id="contribution_to_knowledge_decision" value="Yes">
                      <label class="form-check-label" for="contribution_to_knowledge_decision">Yes</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="contribution_to_knowledge_decision" id="contribution_to_knowledge_decision" value="No">
                      <label class="form-check-label" for="contribution_to_knowledge_decision">No</label>
                    </div>
                    <div class="form-group">
                      <textarea id="contribution_to_knowledge_comments" name="contribution_to_knowledge_comments" class="form-control" placeholder="Other Comments"></textarea>
                    </div>
                  </div> 

                  @endif
              @endforeach
            @endif 

          </div>

          <div class="form-group">
            <label for="technical_soundness_decision">2.	Is this paper technically sound?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->technical_soundness_decision !== null && $review->project_id === $records->id)

                  <div class="form-group">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="technical_soundness_decision" id="technical_soundness_decision" value="Yes" disabled {{ $review->technical_soundness_decision == 'Yes' ? 'checked' : '' }}>
                      <label class="form-check-label" for="technical_soundness_decision">Yes</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="technical_soundness_decision" id="technical_soundness_decision" value="No" disabled {{ $review->technical_soundness_decision == 'No' ? 'checked' : '' }}>
                      <label class="form-check-label" for="technical_soundness_decision">No</label>
                    </div>
                    <div class="form-group">
                      <textarea id="technical_soundness_comments" name="technical_soundness_comments" class="form-control" placeholder="Other Comments" readonly>{{ $review->technical_soundness_comments }}</textarea>
                    </div>
                  </div> 

                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->technical_soundness_decision === null && $review->project_id === $records->id)
                  
                  <div class="form-group">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="technical_soundness_decision" id="technical_soundness_decision" value="Yes">
                      <label class="form-check-label" for="technical_soundness_decision">Yes</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="technical_soundness_decision" id="technical_soundness_decision" value="No">
                      <label class="form-check-label" for="technical_soundness_decision">No</label>
                    </div>
                    <div class="form-group">
                      <textarea id="technical_soundness_comments" name="technical_soundness_comments" class="form-control" placeholder="Other Comments"></textarea>
                    </div>
                  </div> 

                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="comprehensive_subject_matter_decision">3.	Is the subject matter presented in a comprehensive manner?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->comprehensive_subject_matter_decision !== null && $review->project_id === $records->id)
                  
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="comprehensive_subject_matter_decision" id="comprehensive_subject_matter_decision" value="Yes" disabled {{ $review->comprehensive_subject_matter_decision == 'Yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="comprehensive_subject_matter_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="comprehensive_subject_matter_decision" id="comprehensive_subject_matter_decision" value="No" disabled {{ $review->comprehensive_subject_matter_decision == 'No' ? 'checked' : '' }}>
                        <label class="form-check-label" for="comprehensive_subject_matter_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="comprehensive_subject_matter_comments" name="comprehensive_subject_matter_comments" class="form-control" placeholder="Other Comments" readonly>{{ $review->comprehensive_subject_matter_comments }}</textarea>
                      </div>
                    </div> 

                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->comprehensive_subject_matter_decision === null && $review->project_id === $records->id)

                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="comprehensive_subject_matter_decision" id="comprehensive_subject_matter_decision" value="Yes">
                        <label class="form-check-label" for="comprehensive_subject_matter_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="comprehensive_subject_matter_decision" id="comprehensive_subject_matter_decision" value="No">
                        <label class="form-check-label" for="comprehensive_subject_matter_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="comprehensive_subject_matter_comments" name="comprehensive_subject_matter_comments" class="form-control" placeholder="Other Comments"></textarea>
                      </div>
                    </div> 

                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="applicable_and_sufficient_references_decision">4.	Are the references provided applicable and sufficient?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->applicable_and_sufficient_references_decision !== null && $review->project_id === $records->id)
                  
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="applicable_and_sufficient_references_decision" id="applicable_and_sufficient_references_decision" value="Yes" disabled {{ $review->applicable_and_sufficient_references_decision == 'Yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="applicable_and_sufficient_references_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="applicable_and_sufficient_references_decision" id="applicable_and_sufficient_references_decision" value="No" disabled {{ $review->applicable_and_sufficient_references_decision == 'No' ? 'checked' : '' }}>
                        <label class="form-check-label" for="applicable_and_sufficient_references_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="applicable_and_sufficient_references_comments" name="applicable_and_sufficient_references_comments" class="form-control" placeholder="Other Comments" readonly>{{ $review->applicable_and_sufficient_references_comments }}</textarea>
                      </div>
                    </div> 

                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->applicable_and_sufficient_references_decision === null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="applicable_and_sufficient_references_decision" id="applicable_and_sufficient_references_decision" value="Yes">
                        <label class="form-check-label" for="applicable_and_sufficient_references_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="applicable_and_sufficient_references_decision" id="applicable_and_sufficient_references_decision" value="No">
                        <label class="form-check-label" for="applicable_and_sufficient_references_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="applicable_and_sufficient_references_comments" name="applicable_and_sufficient_references_comments" class="form-control" placeholder="Other Comments"></textarea>
                      </div>
                    </div> 

                  @endif
              @endforeach
            @endif 
          </div>
          
          <div class="form-group">
            <label for="inappropriate_references_decision">5.	Are there references that are not appropriate for the topic being discussed?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->inappropriate_references_decision !== null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inappropriate_references_decision" id="inappropriate_references_decision" value="Yes" disabled {{ $review->inappropriate_references_decision == 'Yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="inappropriate_references_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inappropriate_references_decision" id="inappropriate_references_decision" value="No" disabled {{ $review->inappropriate_references_decision == 'No' ? 'checked' : '' }}>
                        <label class="form-check-label" for="inappropriate_references_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="inappropriate_references_comments" name="inappropriate_references_comments" class="form-control" placeholder="Other Comments" readonly>{{ $review->inappropriate_references_comments }}</textarea>
                      </div>
                    </div> 

                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->inappropriate_references_decision === null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inappropriate_references_decision" id="inappropriate_references_decision" value="Yes">
                        <label class="form-check-label" for="inappropriate_references_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inappropriate_references_decision" id="inappropriate_references_decision" value="No">
                        <label class="form-check-label" for="inappropriate_references_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="inappropriate_references_comments" name="inappropriate_references_comments" class="form-control" placeholder="Other Comments"></textarea>
                      </div>
                    </div> 

                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="comprehensive_application_decision">6.	Is the application comprehensive?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->comprehensive_application_decision !== null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="comprehensive_application_decision" id="comprehensive_application_decision" value="Yes" disabled {{ $review->comprehensive_application_decision == 'Yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="comprehensive_application_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="comprehensive_application_decision" id="comprehensive_application_decision" value="No" disabled {{ $review->comprehensive_application_decision == 'No' ? 'checked' : '' }}>
                        <label class="form-check-label" for="comprehensive_application_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="comprehensive_application_comments" name="comprehensive_application_comments" class="form-control" placeholder="Other Comments" readonly>{{ $review->comprehensive_application_comments }}</textarea>
                      </div>
                    </div> 

                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->comprehensive_application_decision === null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="comprehensive_application_decision" id="comprehensive_application_decision" value="Yes">
                        <label class="form-check-label" for="comprehensive_application_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="comprehensive_application_decision" id="comprehensive_application_decision" value="No">
                        <label class="form-check-label" for="comprehensive_application_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="comprehensive_application_comments" name="comprehensive_application_comments" class="form-control" placeholder="Other Comments"></textarea>
                      </div>
                    </div> 

                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="assumption_of_reader_knowledge_decision">7.	Is the grammar and presentation poor? Although this should not be heavily waited.</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->grammar_and_presentation_decision !== null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="grammar_and_presentation_decision" id="grammar_and_presentation_decision" value="Yes" disabled {{ $review->grammar_and_presentation_decision == 'Yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="grammar_and_presentation_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="grammar_and_presentation_decision" id="grammar_and_presentation_decision" value="No" disabled {{ $review->grammar_and_presentation_decision == 'No' ? 'checked' : '' }}>
                        <label class="form-check-label" for="grammar_and_presentation_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="grammar_and_presentation_comments" name="grammar_and_presentation_comments" class="form-control" placeholder="Other Comments" readonly>{{ $review->grammar_and_presentation_comments }}</textarea>
                      </div>
                    </div> 

                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->grammar_and_presentation_decision === null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="grammar_and_presentation_decision" id="grammar_and_presentation_decision" value="Yes">
                        <label class="form-check-label" for="grammar_and_presentation_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="grammar_and_presentation_decision" id="grammar_and_presentation_decision" value="No">
                        <label class="form-check-label" for="grammar_and_presentation_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="grammar_and_presentation_comments" name="grammar_and_presentation_comments" class="form-control" placeholder="Other Comments"></textarea>
                      </div>
                    </div> 

                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="assumption_of_reader_knowledge_decision">8.	If the submission is very technical, is it because the author has assumed too much of the reader’s knowledge?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->assumption_of_reader_knowledge_decision !== null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="assumption_of_reader_knowledge_decision" id="assumption_of_reader_knowledge_decision" value="Yes" disabled {{ $review->assumption_of_reader_knowledge_decision == 'Yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="assumption_of_reader_knowledge_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="assumption_of_reader_knowledge_decision" id="assumption_of_reader_knowledge_decision" value="No" disabled {{ $review->assumption_of_reader_knowledge_decision == 'No' ? 'checked' : '' }}>
                        <label class="form-check-label" for="assumption_of_reader_knowledge_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="assumption_of_reader_knowledge_comments" name="assumption_of_reader_knowledge_comments" class="form-control" placeholder="Other Comments" readonly>{{ $review->assumption_of_reader_knowledge_comments }}</textarea>
                      </div>
                    </div> 

                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->assumption_of_reader_knowledge_decision === null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="assumption_of_reader_knowledge_decision" id="assumption_of_reader_knowledge_decision" value="Yes">
                        <label class="form-check-label" for="assumption_of_reader_knowledge_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="assumption_of_reader_knowledge_decision" id="assumption_of_reader_knowledge_decision" value="No">
                        <label class="form-check-label" for="assumption_of_reader_knowledge_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="assumption_of_reader_knowledge_comments" name="assumption_of_reader_knowledge_comments" class="form-control" placeholder="Other Comments"></textarea>
                      </div>
                    </div> 

                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="clear_figures_and_tables_decision">9.	Are figures and tables clear and easy to interpret?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->clear_figures_and_tables_decision !== null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="clear_figures_and_tables_decision" id="clear_figures_and_tables_decision" value="Yes" disabled {{ $review->clear_figures_and_tables_decision == 'Yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="clear_figures_and_tables_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="clear_figures_and_tables_decision" id="clear_figures_and_tables_decision" value="No" disabled {{ $review->clear_figures_and_tables_decision == 'No' ? 'checked' : '' }}>
                        <label class="form-check-label" for="clear_figures_and_tables_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="clear_figures_and_tables_comments" name="clear_figures_and_tables_comments" class="form-control" placeholder="Other Comments" readonly>{{ $review->clear_figures_and_tables_comments }}</textarea>
                      </div>
                    </div> 

                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->clear_figures_and_tables_decision === null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="clear_figures_and_tables_decision" id="clear_figures_and_tables_decision" value="Yes">
                        <label class="form-check-label" for="clear_figures_and_tables_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="clear_figures_and_tables_decision" id="clear_figures_and_tables_decision" value="No">
                        <label class="form-check-label" for="clear_figures_and_tables_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="clear_figures_and_tables_comments" name="clear_figures_and_tables_comments" class="form-control" placeholder="Other Comments"></textarea>
                      </div>
                    </div> 

                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="adequate_explanations_decision">10.	Are explanations adequate?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->adequate_explanations_decision !== null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="adequate_explanations_decision" id="adequate_explanations_decision" value="Yes" disabled {{ $review->adequate_explanations_decision == 'Yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="adequate_explanations_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="adequate_explanations_decision" id="adequate_explanations_decision" value="No" disabled {{ $review->adequate_explanations_decision == 'No' ? 'checked' : '' }}>
                        <label class="form-check-label" for="adequate_explanations_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="adequate_explanations_comments" name="adequate_explanations_comments" class="form-control" placeholder="Other Comments" readonly>{{ $review->adequate_explanations_comments }}</textarea>
                      </div>
                    </div> 

                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->adequate_explanations_decision === null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="adequate_explanations_decision" id="adequate_explanations_decision" value="Yes">
                        <label class="form-check-label" for="adequate_explanations_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="adequate_explanations_decision" id="adequate_explanations_decision" value="No">
                        <label class="form-check-label" for="adequate_explanations_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="adequate_explanations_comments" name="adequate_explanations_comments" class="form-control" placeholder="Other Comments"></textarea>
                      </div>
                    </div> 

                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="technical_or_methodological_errors_decision">11.	Are there any technical or methodological errors?</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->technical_or_methodological_errors_decision !== null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="technical_or_methodological_errors_decision" id="technical_or_methodological_errors_decision" value="Yes" disabled {{ $review->technical_or_methodological_errors_decision == 'Yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="technical_or_methodological_errors_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="technical_or_methodological_errors_decision" id="technical_or_methodological_errors_decision" value="No" disabled {{ $review->technical_or_methodological_errors_decision == 'No' ? 'checked' : '' }}>
                        <label class="form-check-label" for="technical_or_methodological_errors_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="technical_or_methodological_errors_comments" name="technical_or_methodological_errors_comments" class="form-control" placeholder="Other Comments" readonly>{{ $review->technical_or_methodological_errors_comments }}</textarea>
                      </div>
                    </div> 

                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->technical_or_methodological_errors_decision === null && $review->project_id === $records->id)
                    
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="technical_or_methodological_errors_decision" id="technical_or_methodological_errors_decision" value="Yes">
                        <label class="form-check-label" for="technical_or_methodological_errors_decision">Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="technical_or_methodological_errors_decision" id="technical_or_methodological_errors_decision" value="No">
                        <label class="form-check-label" for="technical_or_methodological_errors_decision">No</label>
                      </div>
                      <div class="form-group">
                        <textarea id="technical_or_methodological_errors_comments" name="technical_or_methodological_errors_comments" class="form-control" placeholder="Other Comments"></textarea>
                      </div>
                    </div> 

                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="reseach_project_name">Project Name</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->reseach_project_name !== null && $review->project_id === $records->id)
                    <textarea id="reseach_project_name" name="reseach_project_name" class="form-control" readonly>{{ $review->reseach_project_name }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->reseach_project_name === null && $review->project_id === $records->id)
                    <textarea id="reseach_project_name" name="reseach_project_name" class="form-control"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="reseach_project_group">Research Group</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->reseach_project_group !== null && $review->project_id === $records->id)
                    <textarea id="reseach_project_group" name="reseach_project_group" class="form-control" readonly>{{ $review->reseach_project_group }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->reseach_project_group === null && $review->project_id === $records->id)
                    <textarea id="reseach_project_group" name="reseach_project_group" class="form-control"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="project_introduction">Introduction</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->project_introduction !== null && $review->project_id === $records->id)
                    <textarea id="project_introduction" name="project_introduction" class="form-control" readonly>{{ $review->project_introduction }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->project_introduction === null && $review->project_id === $records->id)
                    <textarea id="project_introduction" name="project_introduction" class="form-control"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="project_aims_and_objectives">Aims and Objectives</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->project_aims_and_objectives !== null && $review->project_id === $records->id)
                    <textarea id="project_aims_and_objectives" name="project_aims_and_objectives" class="form-control" readonly>{{ $review->project_aims_and_objectives }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->project_aims_and_objectives === null && $review->project_id === $records->id)
                    <textarea id="project_aims_and_objectives" name="project_aims_and_objectives" class="form-control"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="project_background">Background</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->project_background !== null && $review->project_id === $records->id)
                    <textarea id="project_background" name="project_background" class="form-control" readonly>{{ $review->project_background }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->project_background === null && $review->project_id === $records->id)
                    <textarea id="project_background" name="project_background" class="form-control"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="project_expected_research_contribution">Expected Research Contribution</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->project_expected_research_contribution !== null && $review->project_id === $records->id)
                    <textarea id="project_expected_research_contribution" name="project_expected_research_contribution" class="form-control" readonly>{{ $review->project_expected_research_contribution }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->project_expected_research_contribution === null && $review->project_id === $records->id)
                    <textarea id="project_expected_research_contribution" name="project_expected_research_contribution" class="form-control"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="project_proposed_methodology">Proposed Methodology</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->project_proposed_methodology !== null && $review->project_id === $records->id)
                    <textarea id="project_proposed_methodology" name="project_proposed_methodology" class="form-control" readonly>{{ $review->project_proposed_methodology }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->project_expected_research_contribution === null && $review->project_id === $records->id)
                    <textarea id="project_proposed_methodology" name="project_proposed_methodology" class="form-control"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="project_workplan">Workplan</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->project_workplan !== null && $review->project_id === $records->id)
                    <textarea id="project_workplan" name="project_workplan" class="form-control" readonly>{{ $review->project_workplan }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->project_expected_research_contribution === null && $review->project_id === $records->id)
                    <textarea id="project_workplan" name="project_workplan" class="form-control"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="project_resources">Resources</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->project_resources !== null && $review->project_id === $records->id)
                    <textarea id="project_resources" name="project_resources" class="form-control" readonly>{{ $review->project_resources }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->project_expected_research_contribution === null && $review->project_id === $records->id)
                    <textarea id="project_resources" name="project_resources" class="form-control"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="project_references">References</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->project_references !== null && $review->project_id === $records->id)
                    <textarea id="project_references" name="project_references" class="form-control" readonly>{{ $review->project_references }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->project_references === null && $review->project_id === $records->id)
                    <textarea id="project_references" name="project_references" class="form-control"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

          <div class="form-group">
            <label for="project_total_budget">Total Budget</label>
            @if($reviewerCommented > 0)
              @foreach ($revs as $review) 
                  @if ($review->user->id === Auth::user()->id && $review->project_total_budget !== null && $review->project_id === $records->id)
                    <textarea id="project_total_budget" name="project_total_budget" class="form-control" readonly>{{ $review->project_total_budget }}</textarea>
                  @endif
                  @if ($review->user->id === Auth::user()->id && $review->project_total_budget === null && $review->project_id === $records->id)
                    <textarea id="project_total_budget" name="project_total_budget" class="form-control"></textarea>
                  @endif
              @endforeach
            @endif 
          </div>

            <div class="form-group">
              <label for="other_rsc">Other Comments</label>
              @if($reviewerCommented > 0)
                @foreach ($revs as $review) 
                    @if ($review->user->id === Auth::user()->id && $review->other_comments !== null && $review->project_id === $records->id)
                      <textarea id="other_comments" name="other_comments" class="form-control" readonly>{{ $review->other_comments }}</textarea>
                    @endif
                    @if ($review->user->id === Auth::user()->id && $review->other_comments === null && $review->project_id === $records->id)
                      <textarea id="other_comments" name="other_comments" class="form-control"></textarea>
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
                      <select class="form-control" id="review_decision" name="review_decision">
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

@if (session('success'))
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
