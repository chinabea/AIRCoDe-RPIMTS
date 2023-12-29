<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;
// use Illuminate\Support\Facades\Validator;
use App\Models\CallForProposal;
use App\Models\Project;
use App\Models\User;
use App\Models\Review;

class ReviewController extends Controller
{

    public function index()
    {
        try {
            $id = Auth::id(); // Or however you get the user ID

            $reviewers = Review::where('user_id', $id)->get();

            return view('submission-details.reviews.reviewer.assigned-projects', ['reviewers' => $reviewers]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function reviewed()
    {
        try {
            $id = Auth::id(); // Or however you get the user ID

            $reviewers = Review::where('user_id', $id)->get();

            return view('submission-details.reviews.reviewer.reviewed', ['reviewers' => $reviewers]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function assignedToReview()
    {
        try {
            $id = Auth::id(); // Or however you get the user ID

            $reviewers = Review::where('user_id', $id)->get();

            return view('submission-details.reviews.reviewer.for-review', ['reviewers' => $reviewers]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function forReviews()
    {
        try {
            $projects = Project::where('status', 'For Revision')->get();
            $call_for_proposals = CallForProposal::all();

            return view('submission-details.reviews.for-reviews', compact('projects', 'call_for_proposals'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function show($id)
    {
        try {
            $reviewers = Review::where('user_id', $id)->get();
            $toreview = Review::where('project_id', $id)->get()->first();
            $reviewersss = User::where('role', 4)->get();
            $data = Project::findOrFail($id);
            $records = Project::findOrFail($id);

            $reviewerCommented = Review::where('user_id', Auth::user()->id)
            ->where('project_id', $id)
            ->count();

            // $assignedReviewersCount = Review::where('project_id', $id)->count();
            // $reviewerCommented = Review::where('project_id', $id)
            //     ->whereNotNull('technical_or_methodological_errors_decision')
            //     ->count();


            $irev = Review::where('user_id', Auth::user()->id)
            ->where('project_id', $id)
            ->get();


            return view('submission-details.reviews.for-review-project', compact('id', 'records', 'reviewers', 'toreview','reviewersss','irev',
                        'reviewerCommented'))->with('success', 'Review already added!');
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return redirect()->back()->with('error', 'An error occurred while showing the review : ' . $e->getMessage());
        }

    }
    public function store(Request $request)
    {
    try {
        // dd($request->all());
        $projectId = $request->input('project_id');
        $reviewerIds = $request->input('reviewer_ids');
        $individualDeadlines = $request->input('individual_deadlines');
        $userId = Auth::id();
        $existingReviewers = Review::where('project_id', $projectId)->pluck('user_id')->toArray();


        // Define validation rules
        $rules = [
            'project_id' => 'required|exists:projects,id', // Replace 'projects' with your actual project table name
            'reviews' => 'required|array',
            'reviews.*' => 'exists:reviews,user_id', // Replace 'reviewers' with your actual reviewers table name
            'individual_deadlines' => 'array', // Adjust as needed
            'deadline' => ['required', 'date', 'after_or_equal:today'], // Adjust as needed
        ];

        // Define custom error messages
        $messages = [
            'reviews.*.exists' => 'One or more selected reviewers do not exist.', // Custom message for reviewers
            'deadline.required' => 'The deadline field is required.', // Custom message for required deadline
            'deadline.date' => 'The deadline must be a valid date.', // Custom message for date validation
            'deadline.after_or_equal' => 'The deadline must be on or after today.', // Custom message for after_or_equal validation
        ];

        // Set a single deadline for all reviewers
        $deadline = $request->input('deadline');

            foreach ($reviewerIds as $reviewerId) {
                // Check if the reviewer is already assigned to the project
                if (in_array($reviewerId, $existingReviewers)) {
                    // Display a message that this reviewer is already assigned to review this project
                    return redirect()->route('submission-details.show', ['id' => $projectId])->with('error', 'Reviewer Already Assigned!');
                }

            $newReview = Review::create([
                'project_id' => $projectId,
                'user_id' => $reviewerId,
                'deadline' => $deadline,
                'contribution_to_knowledge_decision' => $request->input('contribution_to_knowledge_decision'),
                'technical_soundness_decision' => $request->input('technical_soundness_decision'),
                'comprehensive_subject_matter_decision' => $request->input('comprehensive_subject_matter_decision'),
                'applicable_and_sufficient_references_decision' => $request->input('applicable_and_sufficient_references_decision'),
                'inappropriate_references_decision' => $request->input('inappropriate_references_decision'),
                'comprehensive_application_decision' => $request->input('comprehensive_application_decision'),
                'grammar_and_presentation_decision' => $request->input('grammar_and_presentation_decision'),
                'assumption_of_reader_knowledge_decision' => $request->input('assumption_of_reader_knowledge_decision'),
                'clear_figures_and_tables_decision' => $request->input('clear_figures_and_tables_decision'),
                'adequate_explanations_decision' => $request->input('adequate_explanations_decision'),
                'technical_or_methodological_errors_decision' => $request->input('technical_or_methodological_errors_decision'),

                'contribution_to_knowledge_comments' => $request->input('contribution_to_knowledge_comments'),
                'technical_soundness_comments' => $request->input('technical_soundness_comments'),
                'comprehensive_subject_matter_comments' => $request->input('comprehensive_subject_matter_comments'),
                'applicable_and_sufficient_references_comments' => $request->input('applicable_and_sufficient_references_comments'),
                'inappropriate_references_comments' => $request->input('inappropriate_references_comments'),
                'comprehensive_application_comments' => $request->input('comprehensive_application_comments'),
                'grammar_and_presentation_comments' => $request->input('grammar_and_presentation_comments'),
                'assumption_of_reader_knowledge_comments' => $request->input('assumption_of_reader_knowledge_comments'),
                'clear_figures_and_tables_comments' => $request->input('clear_figures_and_tables_comments'),
                'adequate_explanations_comments' => $request->input('adequate_explanations_comments'),
                'technical_or_methodological_errors_comments' => $request->input('technical_or_methodological_errors_comments'),

                'reseach_project_name' => $request->input('reseach_project_name') ?? null,
                'reseach_project_group' => $request->input('reseach_project_group') ?? null,
                'project_introduction' => $request->input('project_introduction') ?? null,
                'project_aims_and_objectives' => $request->input('project_aims_and_objectives') ?? null,
                'project_expected_research_contribution' => $request->input('project_expected_research_contribution') ?? null,
                'project_proposed_methodology' => $request->input('project_proposed_methodology') ?? null,
                'project_workplan' => $request->input('project_workplan') ?? null,
                'project_resources' => $request->input('project_resources') ?? null,
                'project_references' => $request->input('project_references') ?? null,
                'project_total_budget' => $request->input('project_total_budget') ?? null,
                
                'other_comments' => $request->input('other_comments'),
                'review_decision' => $request->input('review_decision'),
            ]);

            }
            return redirect()->route('submission-details.show', ['id' => $projectId])->with('existingReviewers', $existingReviewers)->with('success', 'Reviewer Successfully assigned to a project!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function storeComments(Request $request, $id)
    {
        try {
            $userId = Auth::id();

            // Retrieve the project ID(s) that the authenticated user is set to review
            $reviewedProjectIds = Review::where('user_id', $userId)->pluck('project_id');
            // $reviewerId = $project->reviewer_id;

            // Check if the user is allowed to review the specified project
            if ($reviewedProjectIds->contains($id)) {
                // Retrieve the existing review record based on project ID and user ID
                $existingReview = Review::where('project_id', $id)
                ->where('user_id', $userId)
                ->first();

                if ($existingReview) {
                    // Update only the null fields with the values from the request
                    $existingReview->contribution_to_knowledge_decision = $existingReview->contribution_to_knowledge_decision ?? $request->input('contribution_to_knowledge_decision');
                    $existingReview->technical_soundness_decision = $existingReview->technical_soundness_decision ?? $request->input('technical_soundness_decision');
                    $existingReview->comprehensive_subject_matter_decision = $existingReview->comprehensive_subject_matter_decision ?? $request->input('comprehensive_subject_matter_decision');
                    $existingReview->applicable_and_sufficient_references_decision = $existingReview->applicable_and_sufficient_references_decision ?? $request->input('applicable_and_sufficient_references_decision');
                    $existingReview->inappropriate_references_decision = $existingReview->inappropriate_references_decision ?? $request->input('inappropriate_references_decision');
                    $existingReview->comprehensive_application_decision = $existingReview->comprehensive_application_decision ?? $request->input('comprehensive_application_decision');
                    $existingReview->grammar_and_presentation_decision = $existingReview->grammar_and_presentation_decision ?? $request->input('grammar_and_presentation_decision');
                    $existingReview->assumption_of_reader_knowledge_decision = $existingReview->assumption_of_reader_knowledge_decision ?? $request->input('assumption_of_reader_knowledge_decision');
                    $existingReview->clear_figures_and_tables_decision = $existingReview->clear_figures_and_tables_decision ?? $request->input('clear_figures_and_tables_decision');
                    $existingReview->adequate_explanations_decision = $existingReview->adequate_explanations_decision ?? $request->input('adequate_explanations_decision');
                    $existingReview->technical_or_methodological_errors_decision = $existingReview->technical_or_methodological_errors_decision ?? $request->input('technical_or_methodological_errors_decision');

                    $existingReview->contribution_to_knowledge_comments = $existingReview->contribution_to_knowledge_comments ?? $request->input('contribution_to_knowledge_comments');
                    $existingReview->technical_soundness_comments = $existingReview->technical_soundness_comments ?? $request->input('technical_soundness_comments');
                    $existingReview->comprehensive_subject_matter_comments = $existingReview->comprehensive_subject_matter_comments ?? $request->input('comprehensive_subject_matter_comments');
                    $existingReview->applicable_and_sufficient_references_comments = $existingReview->applicable_and_sufficient_references_comments ?? $request->input('applicable_and_sufficient_references_comments');
                    $existingReview->inappropriate_references_comments = $existingReview->inappropriate_references_comments ?? $request->input('inappropriate_references_comments');
                    $existingReview->comprehensive_application_comments = $existingReview->comprehensive_application_comments ?? $request->input('comprehensive_application_comments');
                    $existingReview->grammar_and_presentation_comments = $existingReview->grammar_and_presentation_comments ?? $request->input('grammar_and_presentation_comments');
                    $existingReview->assumption_of_reader_knowledge_comments = $existingReview->assumption_of_reader_knowledge_comments ?? $request->input('assumption_of_reader_knowledge_comments');
                    $existingReview->clear_figures_and_tables_comments = $existingReview->clear_figures_and_tables_comments ?? $request->input('clear_figures_and_tables_comments');
                    $existingReview->adequate_explanations_comments = $existingReview->adequate_explanations_comments ?? $request->input('adequate_explanations_comments');
                    $existingReview->technical_or_methodological_errors_comments = $existingReview->technical_or_methodological_errors_comments ?? $request->input('technical_or_methodological_errors_comments');

                    $existingReview->reseach_project_name = $existingReview->reseach_project_name ?? $request->input('reseach_project_name');
                    $existingReview->reseach_project_group = $existingReview->reseach_project_group ?? $request->input('reseach_project_group');
                    $existingReview->project_introduction = $existingReview->project_introduction ?? $request->input('project_introduction');
                    $existingReview->project_aims_and_objectives = $existingReview->project_aims_and_objectives ?? $request->input('project_aims_and_objectives');
                    $existingReview->project_background = $existingReview->project_background ?? $request->input('project_background');
                    $existingReview->project_expected_research_contribution = $existingReview->project_expected_research_contribution ?? $request->input('project_expected_research_contribution');
                    $existingReview->project_proposed_methodology = $existingReview->project_proposed_methodology ?? $request->input('project_proposed_methodology');
                    $existingReview->project_workplan = $existingReview->project_workplan ?? $request->input('project_workplan');
                    $existingReview->project_resources = $existingReview->project_resources ?? $request->input('project_resources');
                    $existingReview->project_references = $existingReview->project_references ?? $request->input('project_references');
                    $existingReview->project_total_budget = $existingReview->project_total_budget ?? $request->input('project_total_budget');

                    $existingReview->other_comments = $existingReview->other_comments ?? $request->input('other_comments');
                    $existingReview->review_decision = $existingReview->review_decision ?? $request->input('review_decision');

                    $existingReview->save();
                }
            }

            // return redirect()->route('reviewer.home')->with('success', 'Review Successfully Added!');
            return redirect()->back()->with('success', 'Review Successfully Added!');
            } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function storeSummaryReview(Request $request)
    {

        try {
            // $records = Project::findOrFail($id);
            // dd($request->all());
            $userId = Auth::id();
            $validatedData = $request->validate([
                'project_id' => 'required', // Add any other validation rules as needed
            ]);
            $projectId = $request->input('project_id');

            // Check if the user has already commented on the project
            $existingComment = Review::where('user_id', $userId)
                ->where('project_id', $projectId)
                ->first();

            if ($existingComment) {
                return redirect()
                    ->route('submission-details.show', ['id' => $projectId])
                    ->with('error', 'You have already summarized reviews on this project.');
            }
            else {
                $summary = Review::create([
                'project_id' => $projectId,
                'user_id' => $userId,
                'deadline' => $request->input('deadline') ?? null,
                'contribution_to_knowledge_decision' => $request->input('contribution_to_knowledge_decision') ?? null,
                'technical_soundness_decision' => $request->input('technical_soundness_decision') ?? null,
                'comprehensive_subject_matter_decision' => $request->input('comprehensive_subject_matter_decision') ?? null,
                'applicable_and_sufficient_references_decision' => $request->input('applicable_and_sufficient_references_decision') ?? null,
                'inappropriate_references_decision' => $request->input('inappropriate_references_decision') ?? null,
                'comprehensive_application_decision' => $request->input('comprehensive_application_decision') ?? null,
                'grammar_and_presentation_decision' => $request->input('grammar_and_presentation_decision') ?? null,
                'assumption_of_reader_knowledge_decision' => $request->input('assumption_of_reader_knowledge_decision') ?? null,
                'clear_figures_and_tables_decision' => $request->input('clear_figures_and_tables_decision') ?? null,
                'adequate_explanations_decision' => $request->input('adequate_explanations_decision') ?? null,
                'technical_or_methodological_errors_decision' => $request->input('technical_or_methodological_errors_decision') ?? null,

                'contribution_to_knowledge_comments' => $request->input('contribution_to_knowledge_comments') ?? null,
                'technical_soundness_comments' => $request->input('technical_soundness_comments') ?? null,
                'comprehensive_subject_matter_comments' => $request->input('comprehensive_subject_matter_comments') ?? null,
                'applicable_and_sufficient_references_comments' => $request->input('applicable_and_sufficient_references_comments') ?? null,
                'inappropriate_references_comments' => $request->input('inappropriate_references_comments') ?? null,
                'comprehensive_application_comments' => $request->input('comprehensive_application_comments') ?? null,
                'grammar_and_presentation_comments' => $request->input('grammar_and_presentation_comments') ?? null,
                'assumption_of_reader_knowledge_comments' => $request->input('assumption_of_reader_knowledge_comments') ?? null,
                'clear_figures_and_tables_comments' => $request->input('clear_figures_and_tables_comments') ?? null,
                'adequate_explanations_comments' => $request->input('adequate_explanations_comments') ?? null,
                'technical_or_methodological_errors_comments' => $request->input('technical_or_methodological_errors_comments') ?? null,

                'reseach_project_name' => $request->input('reseach_project_name') ?? null,
                'reseach_project_group' => $request->input('reseach_project_group') ?? null,
                'project_introduction' => $request->input('project_introduction') ?? null,
                'project_aims_and_objectives' => $request->input('project_aims_and_objectives') ?? null,
                'project_background' => $request->input('project_background') ?? null,
                'project_expected_research_contribution' => $request->input('project_expected_research_contribution') ?? null,
                'project_proposed_methodology' => $request->input('project_proposed_methodology') ?? null,
                'project_workplan' => $request->input('project_workplan') ?? null,
                'project_resources' => $request->input('project_resources') ?? null,
                'project_references' => $request->input('project_references') ?? null,
                'project_total_budget' => $request->input('project_total_budget') ?? null,

                // 'reseach_project_name' => $request->input('reseach_project_name') ?? null,
                // 'reseach_project_group' => $request->input('reseach_project_group') ?? null,
                // 'project_introduction' => $request->input('project_introduction') ?? null,
                // 'project_aims_and_objectives' => $request->input('project_aims_and_objectives') ?? null,
                // 'project_expected_research_contribution' => $request->input('project_expected_research_contribution') ?? null,
                // 'project_proposed_methodology' => $request->input('project_proposed_methodology') ?? null,
                // 'project_workplan' => $request->input('project_workplan') ?? null,
                // 'project_resources' => $request->input('project_resources') ?? null,
                // 'project_references' => $request->input('project_references') ?? null,
                // 'project_total_budget' => $request->input('project_total_budget') ?? null,

                'other_comments' => $request->input('other_comments') ?? null,
                'review_decision' => $request->input('review_decision') ?? null,
            ]);
            }

            return redirect()->route('staff.home')->with('success', 'Review Summary Added!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function assignReviewers(Request $request, $projectId)
    {
        try {
            // Retrieve the selected reviewer IDs from the form
            $selectedReviewerIds = $request->input('reviewer_ids', []);

            // Find the project
            $project = Project::findOrFail($projectId);

            // Attach selected reviewers to the project without detaching existing reviewers
            $project->reviewers()->syncWithoutDetaching($selectedReviewerIds);

            return redirect()->back()->with('success', 'Reviewers have been assigned to the project.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function review($id)
    {
        try {
            $records = Project::findOrFail($id);
            $toreview = Review::where('project_id', $id)->get()->first();
            $members = User::where('role', 3)->get();
            return view('submission-details.show', compact('records','toreview','members'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
