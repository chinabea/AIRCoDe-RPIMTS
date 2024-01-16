@extends('layouts.template')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
    </section>

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
    @if (Auth::user()->role == 3)

    <div class="col-md-12">
        <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note: <small>Submission of other relevant requirements will end after the
                    closure of Call for Proposal you have proposed the project with.</small></h5>
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
    @endif

    @if (Auth::check())
    @if (Auth::user()->role == 1 || Auth::user()->role == 3)
    @elseif(Auth::user()->role == 2 || Auth::user()->role == 4)
    <div class="col-md-12">

        @foreach ($revs as $review)
        @if (
        $review->user->id === Auth::user()->id &&
        $review->contribution_to_knowledge !== null &&
        $review->project_id === $records->id)
        <div class="alert alert-danger">
            You have reviewed this project.
        </div>
        @endif
        @endforeach

        <!-- <div class="row">
                        <div class="col-lg-6"> -->
        @if (auth()->user()->role == 2)
        @php
        $assignedReviewersCount = 0;
        $reviewedReviewersCount = 0;

        foreach ($revs as $review) {
        if ($review->user->role === 4 && $review->project_id === $records->id) {
        $assignedReviewersCount++;

        // Check if the reviewer has already submitted a review
        if ($review->technical_or_methodological_errors_decision !== null) {
        $reviewedReviewersCount++;
        }
        }
        }

        $remainingReviewersCount = $assignedReviewersCount - $reviewedReviewersCount;
        @endphp
        <!-- @if ($assignedReviewersCount == 0)
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h6><i class="icon fas fa-exclamation-triangle"></i> Alert! Wait for the reviewers to comment!</h6>
                        </div>
                        @elseif ($assignedReviewersCount - $reviewerCommented < 3)
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h6><i class="icon fas fa-exclamation-triangle"></i> Alert! Collect {{ 3 - ($assignedReviewersCount - $reviewerCommented) }} more review(s) before summarizing.</h6>
                            </div>
                        @endif

                        <p>Total Assigned Reviewers: {{ $assignedReviewersCount }}</p>
                        <p>Reviewed Reviewers: {{ $reviewedReviewersCount }}</p>
                        <p>Remaining Reviewers: {{ $remainingReviewersCount }}</p> -->


        <div class="row">

            <div class="col-xl-8 col-lg-7">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">{{ $records->project_name }}</h6>
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
                                    <th class="align-middle">Does the paper contribute to the body of
                                        knowledge?</th>
                                    <td class="align-middle">
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>{{ $review->user->name }}:</b> {{
                                            $review->contribution_to_knowledge_decision }} </p>
                                        <p>{{ $review->contribution_to_knowledge_comments }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">2</td>
                                    <th class="align-middle">Is this paper technically sound?</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>{{ $review->user->name }}:</b> {{ $review->technical_soundness_decision }}
                                        </p>
                                        <p>{{ $review->technical_soundness_comments }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">3</td>
                                    <th class="align-middle">Is the subject matter presented in a
                                        comprehensive manner?</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>{{ $review->user->name }}:</b> {{
                                            $review->comprehensive_subject_matter_decision }}</p>
                                        <p>{{ $review->comprehensive_subject_matter_comments }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">4</td>
                                    <th class="align-middle">Are the references provided applicable and
                                        sufficient?</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>{{ $review->user->name }}:</b> {{
                                            $review->applicable_and_sufficient_references_decision }}</p>
                                        <p>{{ $review->applicable_and_sufficient_references_comments }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">5</td>
                                    <th class="align-middle">Are there references that are not appropriate
                                        for the topic being discussed?</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>{{ $review->user->name }}:</b> {{
                                            $review->inappropriate_references_decision }}</p>
                                        <p> {{ $review->inappropriate_references_comments }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">6</td>
                                    <th class="align-middle">Is the application comprehensive?</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>{{ $review->user->name }}:</b> {{
                                            $review->comprehensive_application_decision }}</p>
                                        <p> {{ $review->comprehensive_application_comments }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">7</td>
                                    <th class="align-middle">Is the grammar and presentation poor? Although
                                        this should not be heavily waited.</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>{{ $review->user->name }}:</b> {{
                                            $review->grammar_and_presentation_decision }}</p>
                                        <p> {{ $review->grammar_and_presentation_comments }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">8</td>
                                    <th class="align-middle">If the submission is very technical, is it
                                        because the author has assumed too much of the reader’s knowledge?
                                    </th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>{{ $review->user->name }}:</b> {{
                                            $review->assumption_of_reader_knowledge_decision }}</p>
                                        <p> {{ $review->assumption_of_reader_knowledge_comments }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">9</td>
                                    <th class="align-middle">Are figures and tables clear and easy to
                                        interpret?</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>{{ $review->user->name }}:</b> {{
                                            $review->clear_figures_and_tables_decision }}</p>
                                        <p> {{ $review->clear_figures_and_tables_comments }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">10</td>
                                    <th class="align-middle">Are explanations adequate?</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>{{ $review->user->name }}:</b> {{ $review->adequate_explanations_decision
                                            }}</p>
                                        <p> {{ $review->adequate_explanations_comments }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">11</td>
                                    <th class="align-middle">Are there any technical or methodological
                                        errors?</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>{{ $review->user->name }}:</b> {{
                                            $review->technical_or_methodological_errors_decision }}</p>
                                        <p> {{ $review->technical_or_methodological_errors_comments }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">12</td>
                                    <th class="align-middle">Project Name</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>Review: </b> {{ $review->reseach_project_name }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">13</td>
                                    <th class="align-middle">Reseach Group</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>Review: </b> {{ $review->reseach_project_group }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">14</td>
                                    <th class="align-middle">Introduction</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>Review: </b> {{ $review->project_introduction }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">15</td>
                                    <th class="align-middle">Aims and Objectives</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>Review: </b> {{ $review->project_aims_and_objectives }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">16</td>
                                    <th class="align-middle">Background</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>Review: </b> {{ $review->project_background }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">17</td>
                                    <th class="align-middle">Expected Research Contribution</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>Review: </b> {{ $review->project_expected_research_contribution }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">18</td>
                                    <th class="align-middle">Proposed Methodology</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>Review: </b> {{ $review->project_proposed_methodology }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">19</td>
                                    <th class="align-middle">Workplan</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>Review: </b> {{ $review->project_workplan }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">20</td>
                                    <th class="align-middle">Resources</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>Review: </b> {{ $review->project_resources }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">21</td>
                                    <th class="align-middle">References</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>Review: </b> {{ $review->project_references }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">22</td>
                                    <th class="align-middle">Budget</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>Review: </b> {{ $review->project_total_budget }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">23</td>
                                    <th class="align-middle">Other Comments</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>Review: </b>
                                            {{ $review->other_comments }}</p>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">24</td>
                                    <th class="align-middle">Review Decision</th>
                                    <td>
                                        @foreach ($revs as $review)
                                        @if ($review->user->role === 4 && $review->project_id === $records->id)
                                        <p><b>Review: </b>
                                            {{ $review->review_decision }}</p>
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
                        @if (auth()->user()->role == 2)
                        <h6 class="m-0">Summarize Review</h6>
                        <input type="hidden" name="project_id" value="{{ $records->id }}">
                        @elseif(auth()->user()->role == 4)
                        <h6 class="m-0 font-weight-bold text-primary text-center">Review</h6>
                        @endif
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <form method="POST" @if (auth()->user()->role == 2) action="{{ route('store.summary.reviews',
                            $records->id) }}">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ $records->id }}">
                            @elseif(auth()->user()->role == 4)
                            action="{{ route('reviews.storeComments', $records->id) }}">
                            @csrf @endif

                            <div class="form-group">
                                <label for="other_rsc">1. Does the paper contribute to the body
                                    of knowledge?</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->technical_or_methodological_errors_decision !== null &&
                                $review->project_id === $records->id)

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="contribution_to_knowledge_decision"
                                            id="contribution_to_knowledge_decision" value="Yes" disabled {{
                                            $review->contribution_to_knowledge_decision == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="contribution_to_knowledge_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="contribution_to_knowledge_decision"
                                            id="contribution_to_knowledge_decision" value="No" disabled {{
                                            $review->contribution_to_knowledge_decision == 'No' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="contribution_to_knowledge_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="contribution_to_knowledge_comments"
                                            name="contribution_to_knowledge_comments" class="form-control"
                                            placeholder="Other Comments"
                                            readonly>{{ $review->contribution_to_knowledge_comments }}</textarea>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @else

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="contribution_to_knowledge_decision"
                                            id="contribution_to_knowledge_decision" value="Yes">
                                        <label class="form-check-label"
                                            for="contribution_to_knowledge_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="contribution_to_knowledge_decision"
                                            id="contribution_to_knowledge_decision" value="No">
                                        <label class="form-check-label"
                                            for="contribution_to_knowledge_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="contribution_to_knowledge_comments"
                                            name="contribution_to_knowledge_comments" class="form-control"
                                            placeholder="Other Comments"></textarea>
                                    </div>
                                </div>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="other_rsc">2. Is this paper technically sound?</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->technical_soundness_decision !== null &&
                                $review->project_id === $records->id)

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="technical_soundness_decision"
                                            id="technical_soundness_decision" value="Yes" disabled {{
                                            $review->technical_soundness_decision == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="technical_soundness_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="technical_soundness_decision"
                                            id="technical_soundness_decision" value="No" disabled {{
                                            $review->technical_soundness_decision == 'No' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="technical_soundness_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="technical_soundness_comments" name="technical_soundness_comments"
                                            class="form-control" placeholder="Other Comments"
                                            readonly>{{ $review->technical_soundness_comments }}</textarea>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @else

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="technical_soundness_decision"
                                            id="technical_soundness_decision" value="Yes">
                                        <label class="form-check-label" for="technical_soundness_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="technical_soundness_decision"
                                            id="technical_soundness_decision" value="No">
                                        <label class="form-check-label" for="technical_soundness_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="technical_soundness_comments" name="technical_soundness_comments"
                                            class="form-control" placeholder="Other Comments"></textarea>
                                    </div>
                                </div>
                                @endif
                            </div>



                            <div class="form-group">
                                <label for="other_rsc">3. Is the subject matter presented in a
                                    comprehensive manner?</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->technical_or_methodological_errors_decision !== null &&
                                $review->project_id === $records->id)
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="comprehensive_subject_matter_decision"
                                            id="comprehensive_subject_matter_decision" value="Yes" disabled {{
                                            $review->comprehensive_subject_matter_decision == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="comprehensive_subject_matter_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="comprehensive_subject_matter_decision"
                                            id="comprehensive_subject_matter_decision" value="No" disabled {{
                                            $review->comprehensive_subject_matter_decision == 'No' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="comprehensive_subject_matter_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="comprehensive_subject_matter_comments"
                                            name="comprehensive_subject_matter_comments" class="form-control"
                                            placeholder="Other Comments"
                                            readonly>{{ $review->comprehensive_subject_matter_comments }}</textarea>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @else


                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="comprehensive_subject_matter_decision"
                                            id="comprehensive_subject_matter_decision" value="Yes">
                                        <label class="form-check-label"
                                            for="comprehensive_subject_matter_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="comprehensive_subject_matter_decision"
                                            id="comprehensive_subject_matter_decision" value="No">
                                        <label class="form-check-label"
                                            for="comprehensive_subject_matter_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="comprehensive_subject_matter_comments"
                                            name="comprehensive_subject_matter_comments" class="form-control"
                                            placeholder="Other Comments"></textarea>
                                    </div>
                                </div>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="other_rsc">4. Are the references provided
                                    applicable and sufficient?</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->technical_or_methodological_errors_decision !== null &&
                                $review->project_id === $records->id)

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="applicable_and_sufficient_references_decision"
                                            id="applicable_and_sufficient_references_decision" value="Yes" disabled {{
                                            $review->applicable_and_sufficient_references_decision == 'Yes' ? 'checked'
                                        : '' }}>
                                        <label class="form-check-label"
                                            for="applicable_and_sufficient_references_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="applicable_and_sufficient_references_decision"
                                            id="applicable_and_sufficient_references_decision" value="No" disabled {{
                                            $review->applicable_and_sufficient_references_decision == 'No' ? 'checked' :
                                        '' }}>
                                        <label class="form-check-label"
                                            for="applicable_and_sufficient_references_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="applicable_and_sufficient_references_comments"
                                            name="applicable_and_sufficient_references_comments" class="form-control"
                                            placeholder="Other Comments"
                                            readonly>{{ $review->applicable_and_sufficient_references_comments }}</textarea>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @else

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="applicable_and_sufficient_references_decision"
                                            id="applicable_and_sufficient_references_decision" value="Yes">
                                        <label class="form-check-label"
                                            for="applicable_and_sufficient_references_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="applicable_and_sufficient_references_decision"
                                            id="applicable_and_sufficient_references_decision" value="No">
                                        <label class="form-check-label"
                                            for="applicable_and_sufficient_references_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="applicable_and_sufficient_references_comments"
                                            name="applicable_and_sufficient_references_comments" class="form-control"
                                            placeholder="Other Comments"></textarea>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">5. Are there references that are not
                                    appropriate for the topic being discussed?</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->technical_or_methodological_errors_decision !== null &&
                                $review->project_id === $records->id)

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="inappropriate_references_decision"
                                            id="inappropriate_references_decision" value="Yes" disabled {{
                                            $review->inappropriate_references_decision == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="inappropriate_references_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="inappropriate_references_decision"
                                            id="inappropriate_references_decision" value="No" disabled {{
                                            $review->inappropriate_references_decision == 'No' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="inappropriate_references_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="inappropriate_references_comments"
                                            name="inappropriate_references_comments" class="form-control"
                                            placeholder="Other Comments"
                                            readonly>{{ $review->inappropriate_references_comments }}</textarea>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @else

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="inappropriate_references_decision"
                                            id="inappropriate_references_decision" value="Yes">
                                        <label class="form-check-label"
                                            for="inappropriate_references_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="inappropriate_references_decision"
                                            id="inappropriate_references_decision" value="No">
                                        <label class="form-check-label"
                                            for="inappropriate_references_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="inappropriate_references_comments"
                                            name="inappropriate_references_comments" class="form-control"
                                            placeholder="Other Comments"></textarea>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">6. Is the application comprehensive?</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->technical_or_methodological_errors_decision !== null &&
                                $review->project_id === $records->id)

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="comprehensive_application_decision"
                                            id="comprehensive_application_decision" value="Yes" disabled {{
                                            $review->comprehensive_application_decision == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="comprehensive_application_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="comprehensive_application_decision"
                                            id="comprehensive_application_decision" value="No" disabled {{
                                            $review->comprehensive_application_decision == 'No' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="comprehensive_application_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="comprehensive_application_comments"
                                            name="comprehensive_application_comments" class="form-control"
                                            placeholder="Other Comments"
                                            readonly>{{ $review->comprehensive_application_comments }}</textarea>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @else

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="comprehensive_application_decision"
                                            id="comprehensive_application_decision" value="Yes">
                                        <label class="form-check-label"
                                            for="comprehensive_application_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="comprehensive_application_decision"
                                            id="comprehensive_application_decision" value="No">
                                        <label class="form-check-label"
                                            for="comprehensive_application_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="comprehensive_application_comments"
                                            name="comprehensive_application_comments" class="form-control"
                                            placeholder="Other Comments"></textarea>
                                    </div>
                                </div>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="other_rsc">7. Is the grammar and presentation poor?
                                    Although this should not be heavily waited.</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->technical_or_methodological_errors_decision !== null &&
                                $review->project_id === $records->id)

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="grammar_and_presentation_decision"
                                            id="grammar_and_presentation_decision" value="Yes" disabled {{
                                            $review->grammar_and_presentation_decision == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="grammar_and_presentation_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="grammar_and_presentation_decision"
                                            id="grammar_and_presentation_decision" value="No" disabled {{
                                            $review->grammar_and_presentation_decision == 'No' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="grammar_and_presentation_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="grammar_and_presentation_comments"
                                            name="grammar_and_presentation_comments" class="form-control"
                                            placeholder="Other Comments"
                                            readonly>{{ $review->grammar_and_presentation_comments }}</textarea>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @else

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="grammar_and_presentation_decision"
                                            id="grammar_and_presentation_decision" value="Yes">
                                        <label class="form-check-label"
                                            for="grammar_and_presentation_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="grammar_and_presentation_decision"
                                            id="grammar_and_presentation_decision" value="No">
                                        <label class="form-check-label"
                                            for="grammar_and_presentation_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="grammar_and_presentation_comments"
                                            name="grammar_and_presentation_comments" class="form-control"
                                            placeholder="Other Comments"> </textarea>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">8. If the submission is very technical,
                                    is it because the author has assumed too much of the reader’s knowledge?</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->technical_or_methodological_errors_decision !== null &&
                                $review->project_id === $records->id)

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="assumption_of_reader_knowledge_decision"
                                            id="assumption_of_reader_knowledge_decision" value="Yes" disabled {{
                                            $review->assumption_of_reader_knowledge_decision == 'Yes' ? 'checked' : ''
                                        }}>
                                        <label class="form-check-label"
                                            for="assumption_of_reader_knowledge_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="assumption_of_reader_knowledge_decision"
                                            id="assumption_of_reader_knowledge_decision" value="No" disabled {{
                                            $review->assumption_of_reader_knowledge_decision == 'No' ? 'checked' : ''
                                        }}>
                                        <label class="form-check-label"
                                            for="assumption_of_reader_knowledge_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="assumption_of_reader_knowledge_comments"
                                            name="assumption_of_reader_knowledge_comments" class="form-control"
                                            placeholder="Other Comments"
                                            readonly>{{ $review->assumption_of_reader_knowledge_comments }}</textarea>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @else

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="assumption_of_reader_knowledge_decision"
                                            id="assumption_of_reader_knowledge_decision" value="Yes">
                                        <label class="form-check-label"
                                            for="assumption_of_reader_knowledge_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="assumption_of_reader_knowledge_decision"
                                            id="assumption_of_reader_knowledge_decision" value="No">
                                        <label class="form-check-label"
                                            for="assumption_of_reader_knowledge_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="assumption_of_reader_knowledge_comments"
                                            name="assumption_of_reader_knowledge_comments" class="form-control"
                                            placeholder="Other Comments"></textarea>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">9. Are figures and tables clear and easy to interpret?</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->technical_or_methodological_errors_decision !== null &&
                                $review->project_id === $records->id)

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="clear_figures_and_tables_decision"
                                            id="clear_figures_and_tables_decision" value="Yes" disabled {{
                                            $review->clear_figures_and_tables_decision == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="clear_figures_and_tables_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="clear_figures_and_tables_decision"
                                            id="clear_figures_and_tables_decision" value="No" disabled {{
                                            $review->clear_figures_and_tables_decision == 'No' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="clear_figures_and_tables_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="clear_figures_and_tables_comments"
                                            name="clear_figures_and_tables_comments" class="form-control"
                                            placeholder="Other Comments"
                                            readonly>{{ $review->clear_figures_and_tables_comments }}</textarea>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @else
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="clear_figures_and_tables_decision"
                                            id="clear_figures_and_tables_decision" value="Yes">
                                        <label class="form-check-label"
                                            for="clear_figures_and_tables_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="clear_figures_and_tables_decision"
                                            id="clear_figures_and_tables_decision" value="No">
                                        <label class="form-check-label"
                                            for="clear_figures_and_tables_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="clear_figures_and_tables_comments"
                                            name="clear_figures_and_tables_comments" class="form-control"
                                            placeholder="Other Comments"></textarea>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">10. Are explanations adequate?</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->technical_or_methodological_errors_decision !== null &&
                                $review->project_id === $records->id)


                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="adequate_explanations_decision" id="adequate_explanations_decision"
                                            value="Yes" disabled {{ $review->adequate_explanations_decision == 'Yes' ?
                                        'checked' : '' }}>
                                        <label class="form-check-label" for="adequate_explanations_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="adequate_explanations_decision" id="adequate_explanations_decision"
                                            value="No" disabled {{ $review->adequate_explanations_decision == 'No' ?
                                        'checked' : '' }}>
                                        <label class="form-check-label" for="adequate_explanations_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="adequate_explanations_comments"
                                            name="adequate_explanations_comments" class="form-control"
                                            placeholder="Other Comments"
                                            readonly>{{ $review->adequate_explanations_comments }}</textarea>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @else

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="adequate_explanations_decision" id="adequate_explanations_decision"
                                            value="Yes">
                                        <label class="form-check-label" for="adequate_explanations_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="adequate_explanations_decision" id="adequate_explanations_decision"
                                            value="No">
                                        <label class="form-check-label" for="adequate_explanations_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="adequate_explanations_comments"
                                            name="adequate_explanations_comments" class="form-control"
                                            placeholder="Other Comments"></textarea>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">11. Are there any technical or methodological errors?</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->technical_or_methodological_errors_decision !== null &&
                                $review->project_id === $records->id)

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="technical_or_methodological_errors_decision"
                                            id="technical_or_methodological_errors_decision" value="Yes" disabled {{
                                            $review->technical_or_methodological_errors_decision == 'Yes' ? 'checked' :
                                        '' }}>
                                        <label class="form-check-label"
                                            for="technical_or_methodological_errors_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="technical_or_methodological_errors_decision"
                                            id="technical_or_methodological_errors_decision" value="No" disabled {{
                                            $review->technical_or_methodological_errors_decision == 'No' ? 'checked' :
                                        '' }}>
                                        <label class="form-check-label"
                                            for="technical_or_methodological_errors_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="technical_or_methodological_errors_comments"
                                            name="technical_or_methodological_errors_comments" class="form-control"
                                            placeholder="Other Comments"
                                            readonly>{{ $review->technical_or_methodological_errors_comments }}</textarea>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @else
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="technical_or_methodological_errors_decision"
                                            id="technical_or_methodological_errors_decision" value="Yes">
                                        <label class="form-check-label"
                                            for="technical_or_methodological_errors_decision">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="technical_or_methodological_errors_decision"
                                            id="technical_or_methodological_errors_decision" value="No">
                                        <label class="form-check-label"
                                            for="technical_or_methodological_errors_decision">No</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="technical_or_methodological_errors_comments"
                                            name="technical_or_methodological_errors_comments" class="form-control"
                                            placeholder="Other Comments"></textarea>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">Project Name</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->reseach_project_name !== null &&
                                $review->project_id === $records->id)
                                <textarea id="reseach_project_name" name="reseach_project_name" class="form-control"
                                    readonly>{{ $review->reseach_project_name }}</textarea>
                                @endif
                                @endforeach
                                @else
                                <textarea id="reseach_project_name" name="reseach_project_name"
                                    class="form-control"></textarea>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">Research Group</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->reseach_project_group !== null &&
                                $review->project_id === $records->id)
                                <textarea id="reseach_project_group" name="reseach_project_group" class="form-control"
                                    readonly>{{ $review->reseach_project_group }}</textarea>
                                @endif
                                @endforeach
                                @else
                                <textarea id="reseach_project_group" name="reseach_project_group" class="form-control"
                                    rows="1"></textarea>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">Introduction</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->project_introduction !== null &&
                                $review->project_id === $records->id)
                                <textarea id="project_introduction" name="project_introduction" class="form-control"
                                    readonly>{{ $review->project_introduction }}</textarea>
                                @endif
                                @endforeach
                                @else
                                <textarea id="project_introduction" name="project_introduction" class="form-control"
                                    rows="1"></textarea>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">Introduction</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->project_introduction !== null &&
                                $review->project_id === $records->id)
                                <textarea id="project_introduction" name="project_introduction" class="form-control"
                                    readonly>{{ $review->project_introduction }}</textarea>
                                @endif
                                @endforeach
                                @else
                                <textarea id="project_introduction" name="project_introduction" class="form-control"
                                    rows="1"></textarea>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">Aims and Objectives</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->project_aims_and_objectives !== null &&
                                $review->project_id === $records->id)
                                <textarea id="project_aims_and_objectives" name="project_aims_and_objectives"
                                    class="form-control" readonly>{{ $review->project_aims_and_objectives }}</textarea>
                                @endif
                                @endforeach
                                @else
                                <textarea id="project_aims_and_objectives" name="project_aims_and_objectives"
                                    class="form-control" rows="1"></textarea>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">Background</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->project_background !== null &&
                                $review->project_id === $records->id)
                                <textarea id="project_background" name="project_background" class="form-control"
                                    readonly>{{ $review->project_background }}</textarea>
                                @endif
                                @endforeach
                                @else
                                <textarea id="project_background" name="project_background" class="form-control"
                                    rows="1"></textarea>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">Expected Research Contribution</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->project_expected_research_contribution !== null &&
                                $review->project_id === $records->id)
                                <textarea id="project_expected_research_contribution"
                                    name="project_expected_research_contribution" class="form-control"
                                    readonly>{{ $review->project_expected_research_contribution }}</textarea>
                                @endif
                                @endforeach
                                @else
                                <textarea id="project_expected_research_contribution"
                                    name="project_expected_research_contribution" class="form-control"
                                    rows="1"></textarea>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">Proposed Methodology</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->project_proposed_methodology !== null &&
                                $review->project_id === $records->id)
                                <textarea id="project_proposed_methodology" name="project_proposed_methodology"
                                    class="form-control" readonly>{{ $review->project_proposed_methodology }}</textarea>
                                @endif
                                @endforeach
                                @else
                                <textarea id="project_proposed_methodology" name="project_proposed_methodology"
                                    class="form-control" rows="1"></textarea>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">Workplan</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->project_workplan !== null &&
                                $review->project_id === $records->id)
                                <textarea id="project_workplan" name="project_workplan" class="form-control"
                                    readonly>{{ $review->project_workplan }}</textarea>
                                @endif
                                @endforeach
                                @else
                                <textarea id="project_workplan" name="project_workplan" class="form-control"
                                    rows="1"></textarea>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">Resources</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->project_resources !== null &&
                                $review->project_id === $records->id)
                                <textarea id="project_resources" name="project_resources" class="form-control"
                                    readonly>{{ $review->project_resources }}</textarea>
                                @endif
                                @endforeach
                                @else
                                <textarea id="project_resources" name="project_resources" class="form-control"
                                    rows="1"></textarea>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">References</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->project_resources !== null &&
                                $review->project_id === $records->id)
                                <textarea id="project_references" name="project_references" class="form-control"
                                    readonly>{{ $review->project_resources }}</textarea>
                                @endif
                                @endforeach
                                @else
                                <textarea id="project_references" name="project_references" class="form-control"
                                    rows="1"></textarea>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">Budget</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->project_resources !== null &&
                                $review->project_id === $records->id)
                                <textarea id="project_total_budget" name="project_total_budget" class="form-control"
                                    readonly>{{ $review->project_total_budget }}</textarea>
                                @endif
                                @endforeach
                                @else
                                <textarea id="project_total_budget" name="project_total_budget" class="form-control"
                                    rows="1"></textarea>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="other_rsc">Other Comments</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->other_comments !== null &&
                                $review->project_id === $records->id)
                                <textarea id="other_comments" name="other_comments" class="form-control"
                                    readonly>{{ $review->other_comments }}</textarea>
                                @endif
                                @endforeach
                                @else
                                <textarea id="other_comments" name="other_comments" class="form-control"
                                    rows="1"></textarea>
                                @endif
                            </div>

                            {{-- <div class="form-group">
                                <label for="review_decision">Review Decision</label>
                                @if ($reviewerCommented > 0)
                                @foreach ($revs as $review)
                                @if (
                                $review->user->id === Auth::user()->id &&
                                $review->review_decision !== null &&
                                $review->project_id === $records->id) --}}

                                {{-- <select class="form-control" id="review_decision" name="review_decision" required
                                    @if ($reviewerCommented) disabled @endif>
                                    <option value="">Select</option>
                                    <option value="Accepted" @if ($review->review_decision === 'Accepted') selected
                                        @endif>Accepted
                                    </option>
                                    <option value="Accepted with Revision" @if ($review->review_decision === 'Accepted
                                        with Revision') selected @endif>Accepted with
                                        Revision</option>
                                    <option value="Rejected" @if ($review->review_decision === 'Rejected') selected
                                        @endif>Rejected
                                    </option>
                                </select> --}}
                                {{-- @endif
                                @endforeach --}}

                                <div class="form-group">
                                    <label for="review_decision">Review Decision</label>

                                    @if ($reviewerCommented > 0)
                                    @foreach ($revs as $review)
                                    @if ($review->user->id === Auth::user()->id &&
                                    $review->review_decision !== null &&
                                    $review->project_id === $records->id
                                    )
                                    <select class="form-control" id="review_decision" name="review_decision" required
                                        @if ($reviewerCommented) disabled @endif>
                                        <option value="">Select</option>
                                        <option value="Accepted" @if ($review->review_decision === 'Accepted') selected
                                            @endif>
                                            Accepted
                                        </option>
                                        <option value="Accepted with Revision" @if ($review->review_decision ===
                                            'Accepted with Revision') selected
                                            @endif>
                                            Accepted with Revision
                                        </option>
                                        <option value="Rejected" @if ($review->review_decision === 'Rejected') selected
                                            @endif>
                                            Rejected
                                        </option>
                                    </select>
                                    @endif
                                    @endforeach















                                    @else
                                    <select class="form-control" id="review_decision" name="review_decision" required>
                                        <option value="">Select</option>
                                        <option value="Accepted">Accepted</option>
                                        <option value="Accepted with Revision">Accepted with Revision
                                        </option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
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
        @else
        <div class="card shadow mb-4">
            <div href="#collapseCardExample" class="card-header py-3 d-flex justify-content-center align-items-center"
                data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                <h6 class="m-0 ml-3 font-weight-bold">{{ $records->project_name }}</h6>
            </div>
            <div class="collapse show" id="collapseCardExample" style="">
                <div class="card-body">
                    <label>Research Group</label><br>
                    {!! $records->research_group !!}

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
    @endif

    @if (Auth::user()->role == 1)
    <div class="col-md-12">
        <div class="card card-navy color-palette card-tabs">
            <div class="card-header p-0">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                    <li class="pt-2 px-3">
                        <h3 class="card-title">Submission Details</h3>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="details-btn" data-toggle="tab" href="#details" role="tab"
                            aria-controls="details" aria-selected="false">
                            <i class="fas fa-info-circle mr-2"></i>Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="reviewer-btn" data-toggle="tab" href="#reviewer" role="tab"
                            aria-controls="reviewer" aria-selected="false">
                            <i class="fas fa-user-check mr-2"></i>Reviewer
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="messages-btn" data-toggle="tab" href="#messages" role="tab"
                            aria-controls="messages" aria-selected="false">
                            <i class="fas fa-comments mr-2"></i>Reviews
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="project-team-btn" data-toggle="tab" href="#project-team" role="tab"
                            aria-controls="project-team" aria-selected="false">
                            <i class="fas fa-users mr-2"></i>Members
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tasks-btn" data-toggle="tab" href="#tasks" role="tab"
                            aria-controls="tasks" aria-selected="false">
                            <i class="fas fa-tasks mr-2"></i>Tasks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="lib-btn" data-toggle="tab" href="#lib" role="tab" aria-controls="lib"
                            aria-selected="false">
                            <i class="fas fa-list-alt mr-2"></i>Line-Item Budget
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="files-btn" data-toggle="tab" href="#files" role="tab"
                            aria-controls="files" aria-selected="false">
                            <i class="fas fa-file-alt mr-2"></i>Files
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="versions-btn" data-toggle="tab" href="#versions" role="tab"
                            aria-controls="versions" aria-selected="false">
                            <i class="fas fa-code-branch mr-2"></i>Versions
                        </a>
                    </li>
                </ul>
            </div>
            @elseif(Auth::user()->role == 2)

            @elseif(Auth::user()->role == 3)
            <div class="col-md-12">
                <div class="card card-navy color-palette card-tabs">
                    <div class="card-header p-0">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="pt-2 px-3">
                                <h3 class="card-title">Submission Details</h3>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="details-btn" data-toggle="tab" href="#details" role="tab"
                                    aria-controls="details" aria-selected="false">
                                    <i class="fas fa-info-circle mr-2"></i>Details
                                </a>
                            </li>

                            <li class="nav-item text-center">
                                <a class="nav-link" id="actions-btn" data-toggle="tab" href="#actions" role="tab"
                                    aria-controls="actions" aria-selected="true">
                                    <i class="fas fa-cogs mr-2"></i>Actions
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="project-team-btn" data-toggle="tab" href="#project-team"
                                    role="tab" aria-controls="project-team" aria-selected="false">
                                    <i class="fas fa-users mr-2"></i>Members
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tasks-btn" data-toggle="tab" href="#tasks" role="tab"
                                    aria-controls="tasks" aria-selected="false">
                                    <i class="fas fa-tasks mr-2"></i>Tasks
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="lib-btn" data-toggle="tab" href="#lib" role="tab"
                                    aria-controls="lib" aria-selected="false">
                                    <i class="fas fa-list-alt mr-2"></i>Line-Item Budget
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="files-btn" data-toggle="tab" href="#files" role="tab"
                                    aria-controls="files" aria-selected="false">
                                    <i class="fas fa-file-alt mr-2"></i>Files
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="messages-btn" data-toggle="tab" href="#messages" role="tab"
                                    aria-controls="messages" aria-selected="false">
                                    <i class="fas fa-comments mr-2"></i>Reviews
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="versions-btn" data-toggle="tab" href="#versions" role="tab"
                                    aria-controls="versions" aria-selected="false">
                                    <i class="fas fa-code-branch mr-2"></i>Versions
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endif
                    @endif


                    <div class="card-body">
                        <div id="versions-form" class="mt-4" style="display: none;">
                            <table id="example4" class="table table-hover table-bordered table-sm text-center">
                                <thead>
                                    <tr>
                                        <th>Version Number</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($revised as $revision)
                                    <tr>
                                        <td>{{ $revision->version_number }}</td>
                                        <td>{{ $revision->project_name }}</td>
                                        <td>{{ $revision->created_at }}</td>
                                        <td>
                                            <a
                                                href="{{ route('generate.revision.pdf', ['id' => $revision->id]) }}">Export</a>
                                            <button type="button" class="preview-version btn btn-primary"
                                                data-bs-toggle="modal" data-target="#Version" data-backdrop="static"
                                                data-keyboard="false">
                                                Preview
                                            </button>
                                            @include('preview.preview-version')
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div id="actions-form" class="mt-4" style="display: none;">
                            @if (Auth::user()->role == 3 && $records->status === 'For Revision')
                            <form action="{{ route('projects.update', $records->id) }}" method="POST"
                                id="updateproject">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                                <!-- <input type="hidden" name="call_for_proposal_id" value="call_for_proposal_id"> -->

                                <div class="mb-3">
                                    <label for="tracking_code" class="form-label">Tracking Code</label>
                                    <input type="text" value="{{ $records->tracking_code }}" class="form-control"
                                        id="tracking_code" name="tracking_code" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="call_for_proposal_id">Select Call for Proposal</label>
                                    <select id="call_for_proposal_id" name="call_for_proposal_id"
                                        class="selectpicker form-control" data-live-search="true">
                                        <option value="" disabled selected>Select Call for Proposal</option>
                                        @foreach ($call_for_proposals as $call_for_proposal)
                                        @if ($call_for_proposal->start_date <= now() && $call_for_proposal->end_date >=
                                            now())
                                            <option value="{{ $call_for_proposal->id }}">{{ $call_for_proposal->title }}
                                            </option>
                                            @endif
                                            @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="project_name" class="form-label">Project Name</label>
                                    <input type="text" value="{{ $records->project_name }}" class="form-control"
                                        id="project_name" name="project_name">
                                </div>

                                <div class="mb-3">
                                    <label for="research_group" class="form-label">Research Group</label>
                                    <textarea class="form-control" id="research_group"
                                        name="research_group">{!! $records->research_group !!}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Introduction</label>
                                    <textarea type="text" class="form-control" id="introduction"
                                        name="introduction">{!! $records->introduction !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Aims and Objectives</label>
                                    <textarea type="text" class="form-control" id="aims_and_objectives"
                                        name="aims_and_objectives">{!! $records->aims_and_objectives !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Background</label>
                                    <textarea type="text" class="form-control" id="background"
                                        name="background">{!! $records->background !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Expected Research Contribution</label>
                                    <textarea type="text" class="form-control" id="expected_research_contribution"
                                        name="expected_research_contribution">{!! $records->expected_research_contribution !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">The Proposed Methodology</label>
                                    <textarea type="text" class="form-control" id="proposed_methodology"
                                        name="proposed_methodology">{!! $records->proposed_methodology !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Work Plan</label>
                                    <textarea type="text" class="form-control" id="workplan"
                                        name="workplan">{!! $records->workplan !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Resources</label>
                                    <textarea type="text" class="form-control" id="resources"
                                        name="resources">{!! $records->resources !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">References</label>
                                    <textarea type="text" class="form-control" id="references"
                                        name="references">{!! $records->references !!}</textarea>
                                </div>
                                <button type="submit" class="btn btn-warning float-right">Update Proposal</button>
                            </form>
                            @else
                            <p>You do not have access to edit this project not until the project status is "For
                                Revision."</p>
                            @endif
                        </div>

                        <div id="details-form" class="mt-4" style="display: none;">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title my-2"><i class="fas fa-users"></i> Details</h3>

                                    <a href="{{ route('generate.pdf', ['data_id' => $records->id]) }}"
                                        class="btn bg-navy color-palette float-right"><i
                                            class="fas fa-download fa-sm text-white-50"></i> Export to PDF</a>

                                </div>
                                <div class="card-body">

                                    <label>Project Name:</label><br>
                                    @foreach ($call_for_proposals as $call_for_proposal)
                                    @if ($call_for_proposal->id === $records->call_for_proposal_id)
                                    {{ $call_for_proposal->title }}
                                    @endif
                                    @endforeach
                                    <br>
                                    <br>

                                    <label>Project Name:</label><br>
                                    {{ $records->project_name }}
                                    <br>
                                    <br>

                                    <label>Status:</label><br>
                                    {{ $records->status }}
                                    <br>
                                    <br>

                                    <label>Research Group:</label><br>
                                    {!! $records->research_group !!}
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
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>

                        <div id="tasks-form" class="mt-4" style="display: none;">
                            @if (auth()->check() && auth()->user()->role == 3)
                            @foreach ($call_for_proposals as $call_for_proposal)
                            @if ($call_for_proposal->id === $records->call_for_proposal_id)

                            @php
                            // Check if the end date of the Call for Proposal has passed
                            $isButtonDisabled = now() > $call_for_proposal->end_date;
                            $isProjectForRevision = $records->status === 'For Revision';
                            @endphp

                            <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#Tasks"
                                data-backdrop="static" data-keyboard="false" @if($isButtonDisabled &&
                                !$isProjectForRevision) class="d-none" @endif>
                                Add Task
                            </button>

                            @include('submission-details.tasks.create')

                            @endif
                            @endforeach
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-tasks"></i> Tasks</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-hover table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Descrition</th>
                                                <th>Added At</th>
                                                <th>Due Date</th>
                                                <th>Assigned To</th>
                                                <th>Updated At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $counter = 0;
                                            @endphp
                                            @foreach ($tasks as $task)
                                            @php
                                            $counter++;
                                            @endphp
                                            <tr>
                                                <td>{{ $counter }}.</td>
                                                <td>{{ $task->title }}</td>
                                                <td>{{ $task->description }}</td>
                                                <td>{{ $task->created_at->format('F j, Y') }} </td>
                                                <td>{{ $task->end_date->format('F j, Y') }}</td>
                                                <td>{{ $task->assignedTo->member_name }}</td>

                                                <td>{{ $task->updated_at->format('F j, Y') }}</td>
                                                <td>
                                                    {{-- <a
                                                        href="{{ route('submission-details.tasks.edit', $task->id) }}"
                                                        type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-backdrop="static" data-keyboard="false"
                                                        data-target="#editModal{{ $task->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
                                                    <div class="modal fade" id="editModal{{ $task->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="editModal{{ $task->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="editModal{{ $task->id }}Label">Edit
                                                                        Task
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="post"
                                                                    action="{{ route('submission-details.tasks.update', $task->id) }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body text-left">
                                                                        <div class="form-group">
                                                                            <label for="title">Title</label>
                                                                            <input type="text" name="title" id="title"
                                                                                class="form-control"
                                                                                value="{{ $task->title }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="description">Description</label>
                                                                            <textarea name="description"
                                                                                id="description"
                                                                                class="form-control">{{ $task->description }}</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="assigned_to">Assigned To</label>
                                                                            <select name="assigned_to" id="assigned_to"
                                                                                class="form-control">
                                                                                @foreach ($members as $member)
                                                                                <option value="{{ $member->id }}" {{
                                                                                    $member->id == $task->assigned_to ?
                                                                                    'selected' : '' }}>
                                                                                    {{ $member->name }}
                                                                                </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="start_date">Start Date</label>
                                                                            <input type="date" name="start_date"
                                                                                id="start_date" class="form-control"
                                                                                value="{{ $task->start_date ? $task->start_date->format('Y-m-d') : '' }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="end_date">End Date</label>
                                                                            <input type="date" name="end_date"
                                                                                id="end_date" class="form-control"
                                                                                value="{{ $task->end_date ? $task->end_date->format('Y-m-d') : '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-danger"
                                                        onclick="confirmDelete('{{ route('submission-details.tasks.delete', $task->id) }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                        <div id="lib-form" class="mt-4" style="display: none;">
                            @if (auth()->check() && auth()->user()->role == 3)
                            @foreach ($call_for_proposals as $call_for_proposal)
                            @if ($call_for_proposal->id === $records->call_for_proposal_id)

                            @php
                            // Check if the end date of the Call for Proposal has passed
                            $isButtonDisabled = now() > $call_for_proposal->end_date;
                            $isProjectForRevision = $records->status === 'For Revision';
                            @endphp
                            <button type="button" class="btn btn-primary my-2" data-toggle="modal"
                                data-backdrop="static" data-keyboard="false" data-target="#lib" @if($isButtonDisabled &&
                                !$isProjectForRevision) class="d-none" @endif>
                                Add Line-Item
                            </button>
                            @include('submission-details.line-items-budget.create')
                            @endif
                            @endforeach
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-list-alt"></i> Line-Item Budget</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-hover table-bordered text-center table-sm">
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
                                            @php
                                            $counter = 0;
                                            @endphp
                                            @foreach ($lineItems as $lineItem)
                                            @php
                                            $counter++;
                                            @endphp
                                            <tr>
                                                <td class="align-middle">{{ $counter }}.</td>
                                                <td>{{ $lineItem->name }}</td>
                                                <td>{{ $lineItem->quantity }}</td>
                                                <td>{{ $lineItem->unit_price }}</td>
                                                <td>
                                                    {{-- <a
                                                        href="{{ route('submission-details.line-items-budget.edit', $lineItem->id) }}"
                                                        type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-backdrop="static" data-keyboard="false"
                                                        data-target="#editModal{{ $lineItem->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
                                                    <div class="modal fade" id="editModal{{ $lineItem->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="editModal{{ $lineItem->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="editModal{{ $lineItem->id }}Label">Edit
                                                                        Line-Item Budget</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="post"
                                                                    action="{{ route('submission-details.line-items-budget.update', $lineItem->id) }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        @php
                                                                        $totalAllLineItems = 0;
                                                                        foreach ($allLineItems as $item) {
                                                                        $totalAllLineItems += $item->quantity *
                                                                        $item->unit_price;
                                                                        }
                                                                        @endphp
                                                                        <div class="form-group">
                                                                            <label for="edit_name">Name:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="edit_name{{ $lineItem->id }}"
                                                                                name="name"
                                                                                value="{{ $lineItem->name }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="edit_quantity">Quantity:</label>
                                                                            <input type="number" class="form-control"
                                                                                id="edit_quantity{{ $lineItem->id }}"
                                                                                name="quantity"
                                                                                value="{{ $lineItem->quantity }}"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="edit_unit_price">Unit
                                                                                Price:</label>
                                                                            <input type="number" class="form-control"
                                                                                id="edit_unit_price{{ $lineItem->id }}"
                                                                                name="unit_price"
                                                                                value="{{ $lineItem->unit_price }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-danger"
                                                        onclick="confirmDelete('{{ route('submission-details.line-items-budget.destroy', $lineItem->id) }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group float-center">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Total ₱</span>
                                            </div>
                                            <input type="text" class="form-control bg-light text-large"
                                                id="total_all_line_items"
                                                value="{{ number_format($totalAllLineItems, 2, '.', ',') }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="files-form" class="mt-4" style="display: none;">
                            @if (auth()->check() && auth()->user()->role == 3)
                            @foreach ($call_for_proposals as $call_for_proposal)
                            @if ($call_for_proposal->id === $records->call_for_proposal_id)

                            @php
                            // Check if the end date of the Call for Proposal has passed
                            $isButtonDisabled = now() > $call_for_proposal->end_date;
                            $isProjectForRevision = $records->status === 'For Revision';
                            @endphp
                            <button type="button" class="btn btn-primary my-2" data-toggle="modal"
                                data-backdrop="static" data-keyboard="false" data-target="#filesModal"
                                @if($isButtonDisabled && !$isProjectForRevision) class="d-none" @endif>Add File</button>
                            @include('submission-details.files.create')

                            @endif
                            @endforeach
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-file-alt"></i> Files</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example4" class="table table-hover table-bordered table-sm text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Filename</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        @php
                                        $counter = 0;
                                        @endphp
                                        @foreach ($files as $file)
                                        @php
                                        $counter++;
                                        @endphp
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">{{ $counter }}.</td>
                                                <td>{{ $file->file_name }}</td>
                                                <td>{{ $file->created_at->format('F j, Y') }}</td>
                                                <td>{{ $file->updated_at->format('F j, Y') }}</td>
                                                <td>
                                                    {{-- <a
                                                        href="{{ route('submission-details.files.preview', ['filename' => $file->file_path]) }}"
                                                        class="btn btn-secondary">
                                                        <i class="fas fa-eye"></i>
                                                    </a> --}}

                                                    <a href="{{ route('file.download', ['id' => $file->id]) }}"
                                                        class="btn btn-primary">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                    {{-- <a
                                                        href="{{ route('submission-details.files.edit', $file->id) }}"
                                                        type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-backdrop="static" data-keyboard="false"
                                                        data-target="#editFileModal{{ $file->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
                                                    <div class="modal fade" id="editFileModal{{ $file->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="editFileModal{{ $file->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="editFileModal{{ $file->id }}Label">Edit
                                                                        File</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="post"
                                                                    action="{{ route('submission-details.files.reupload', $file->id) }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="edit_file_name">File
                                                                                Name:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="edit_file_name{{ $file->id }}"
                                                                                name="file_name"
                                                                                value="{{ $file->file_name }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="file">Choose File:</label>
                                                                            <input type="file" class="form-control-file"
                                                                                id="file" name="file"
                                                                                accept=".pdf, .doc, .docx" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-danger"
                                                        onclick="confirmDelete('{{ route('submission-details.files.delete', $file->id) }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>


                        <div id="messages-form" class="mt-4" style="display: none;">
                            @php
                            $reviewAvailable = false; // Initialize a flag
                            @endphp

                            @foreach ($revs as $review)
                            @if ($review->user->role === 2 && $review->project_id === $records->id)
                            <div class="py-3 d-flex justify-content-center align-items-center" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                                <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                                <h3 class="m-0 ml-3 font-weight-bold">{{ $records->project_name }}</h3>

                            </div>
                            @if (auth()->user()->role == 1)
                            <h6 class="m-0 font-weight-bold text-primary text-center">Review Decision</h6>
                            <br>
                            <div class="text-center">
                                <form action="{{ route('projects.updateStatus', ['id' => $records->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="project_id" value="{{ $records->id }}">
                                    <div class="form-group">
                                        <button value="Approved" type="submit" id="status" name="status"
                                            class="btn btn-info">
                                            <i class="fas fa-check-circle mr-2"></i>Accepted
                                        </button>
                                        <button value="For Revision" type="submit" id="status" name="status"
                                            class="btn btn-warning">
                                            <i class="fas fa-edit mr-2"></i>Accepted with Revision
                                        </button>
                                        <button value="Disapproved" type="submit" id="status" name="status"
                                            class="btn btn-danger">
                                            <i class="fas fa-times-circle mr-2"></i>Rejected
                                        </button>
                                    </div>
                                </form>
                            </div>
                            @endif
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
                                            <th class="align-middle">Does the paper contribute to the body of knowledge?
                                            </th>
                                            <td class="align-middle">
                                                <p><b>Review: </b> {{ $review->contribution_to_knowledge_decision }}
                                                </p>
                                                <p>{{ $review->contribution_to_knowledge_comments }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">2</td>
                                            <th class="align-middle">Is this paper technically sound?</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->technical_soundness_decision }}</p>
                                                <p>{{ $review->technical_soundness_comments }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">3</td>
                                            <th class="align-middle">Is the subject matter presented in a comprehensive
                                                manner?</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->comprehensive_subject_matter_decision }}
                                                </p>
                                                <p>{{ $review->comprehensive_subject_matter_comments }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">4</td>
                                            <th class="align-middle">Are the references provided applicable and
                                                sufficient?</th>
                                            <td>
                                                <p><b>Review: </b> {{
                                                    $review->applicable_and_sufficient_references_decision }}</p>
                                                <p>{{ $review->applicable_and_sufficient_references_comments }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">5</td>
                                            <th class="align-middle">Are there references that are not appropriate for
                                                the topic being discussed?</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->inappropriate_references_decision }}</p>
                                                <p> {{ $review->inappropriate_references_comments }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">6</td>
                                            <th class="align-middle">Is the application comprehensive?</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->comprehensive_application_decision }}</p>
                                                <p> {{ $review->comprehensive_application_comments }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">7</td>
                                            <th class="align-middle">Is the grammar and presentation poor? Although this
                                                should not be heavily waited.</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->grammar_and_presentation_decision }}</p>
                                                <p> {{ $review->grammar_and_presentation_comments }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">8</td>
                                            <th class="align-middle">If the submission is very technical, is it because
                                                the author has assumed too much of the reader’s knowledge?</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->assumption_of_reader_knowledge_decision
                                                    }}</p>
                                                <p> {{ $review->assumption_of_reader_knowledge_comments }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">9</td>
                                            <th class="align-middle">Are figures and tables clear and easy to interpret?
                                            </th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->clear_figures_and_tables_decision }}</p>
                                                <p> {{ $review->clear_figures_and_tables_comments }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">10</td>
                                            <th class="align-middle">Are explanations adequate?</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->adequate_explanations_decision }}</p>
                                                <p> {{ $review->adequate_explanations_comments }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">11</td>
                                            <th class="align-middle">Are there any technical or methodological errors?
                                            </th>
                                            <td>
                                                <p><b>Review: </b> {{
                                                    $review->technical_or_methodological_errors_decision }}</p>
                                                <p> {{ $review->technical_or_methodological_errors_comments }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">12</td>
                                            <th class="align-middle">Project Name</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->reseach_project_name }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">13</td>
                                            <th class="align-middle">Reseach Group</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->reseach_project_group }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">14</td>
                                            <th class="align-middle">Introduction</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->project_introduction }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">15</td>
                                            <th class="align-middle">Aims and Objectives</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->project_aims_and_objectives }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">16</td>
                                            <th class="align-middle">Background</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->project_background }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">17</td>
                                            <th class="align-middle">Expected Research Contribution</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->project_expected_research_contribution }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">18</td>
                                            <th class="align-middle">Proposed Methodology</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->project_proposed_methodology }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">19</td>
                                            <th class="align-middle">Workplan</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->project_workplan }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">20</td>
                                            <th class="align-middle">Resources</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->project_resources }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">21</td>
                                            <th class="align-middle">References</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->project_references }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">22</td>
                                            <th class="align-middle">Budget</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->project_total_budget }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">23</td>
                                            <th class="align-middle">Other Comments</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->other_comments }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">24</td>
                                            <th class="align-middle">Review Decision</th>
                                            <td>
                                                <p><b>Review: </b> {{ $review->review_decision }}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                            @foreach ($call_for_proposals as $call_for_proposal)
                            @if ($call_for_proposal->id === $records->call_for_proposal_id)

                            @php
                            // Check if the end date of the Call for Proposal has passed
                            $isButtonDisabled = now() > $call_for_proposal->end_date;
                            $isProjectForRevision = $records->status === 'For Revision';
                            @endphp
                            <button type="button" class="btn btn-primary my-2" data-toggle="modal"
                                data-backdrop="static" data-keyboard="false" data-target="#ProjectTeam"
                                @if($isButtonDisabled && !$isProjectForRevision) class="d-none" @endif>Add
                                Member</button>
                            @include('submission-details.project-teams.create')

                            @endif
                            @endforeach
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-users"></i> Members</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example3" class="table table-hover table-bordered table-sm text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @php
                                        $counter = 0;
                                        @endphp
                                        @foreach ($teamMembers as $member)
                                        @php
                                        $counter++;
                                        @endphp
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">{{ $counter }}.</td>
                                                <td>{{ $member->member_name }}</td>
                                                <td>{{ $member->role }}</td>
                                                <td>
                                                    {{-- <a
                                                        href="{{ route('submission-details.project-teams.edit', $member->id) }}"
                                                        type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-backdrop="static" data-keyboard="false"
                                                        data-target="#editModal{{ $member->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
                                                    <div class="modal fade" id="editModal{{ $member->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="editModal{{ $member->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="editModal{{ $member->id }}Label">Edit
                                                                        Project Team Member</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="post"
                                                                    action="{{ route('submission-details.project-teams.update', $member->id) }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="edit_member_name">Name:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="edit_member_name{{ $member->id }}"
                                                                                name="member_name"
                                                                                value="{{ $member->member_name }}"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="edit_role">Role:</label>
                                                                            <select class="form-control"
                                                                                id="edit_role{{ $member->id }}"
                                                                                name="role" required>
                                                                                <option disabled>Select Role</option>
                                                                                <option{{ $member->role === 'Project
                                                                                    Leader' ? ' selected' : '' }}>
                                                                                    Project Leader</option>
                                                                                    <option{{ $member->role ===
                                                                                        'Database Designer' ? '
                                                                                        selected' : '' }}>
                                                                                        Database Designer</option>
                                                                                        <option{{ $member->role ===
                                                                                            'Network Designer' ? '
                                                                                            selected' : '' }}>
                                                                                            Network Designer</option>
                                                                                            <option{{ $member->role ===
                                                                                                'UI Designer' ? '
                                                                                                selected' : '' }}>
                                                                                                UI Designer</option>
                                                                                                <option{{ $member->role
                                                                                                    === 'Quality
                                                                                                    Assurance' ? '
                                                                                                    selected' : '' }}>
                                                                                                    Quality Assurance
                                                                                                    </option>
                                                                                                    <option{{ $member->
                                                                                                        role ===
                                                                                                        'Document
                                                                                                        Writer' ? '
                                                                                                        selected' : ''
                                                                                                        }}>
                                                                                                        Document Writer
                                                                                                        </option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-danger"
                                                        onclick="confirmDelete('{{ route('submission-details.project-teams.destroy', $member->id) }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>

                        <div id="reviewer-form" class="mt-4" style="display: none;">
                            <button type="button" class="btn btn-primary my-2" data-toggle="modal"
                                data-target="#ReviewerModal" data-backdrop="static" data-keyboard="false">Select
                                Reviewer</button>
                            @include('submission-details.reviews.select-reviewer')
                        </div>
                        <table id="example4" class="table table-hover table-bordered table-sm text-center">
                            <thead>
                                <tr>
                                    <th>Project Title</th>
                                    <th>Reviewer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assignedReviewers as $review)
                                <tr>
                                    <td>{{ $review->project->project_name }}</td>
                                    <td>{{ $review->reviewer->name }}</td>
                                    <td>
                                        @if ($review->contribution_to_knowledge_decision)
                                        <span class="badge badge-success">Reviewed</span>
                                        @else
                                        <span class="badge badge-danger">For Review</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

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
                form.innerHTML = '@csrf @method('delete')';
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>



    @endsection